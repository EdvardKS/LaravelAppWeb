<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Day;
use Illuminate\Http\Request;
use App\Models\HorariosApertura;

class DaysController extends Controller
{
    //Muestra una vista junto con los horarios de apaertura
    public function index()
    {
        $horarios = HorariosApertura::all();
        return view('admin.days.index', ['horarios' => $horarios]);
    }



    //Este método guarda o actualiza los horarios de apertura y cierre para un día específico
    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required|date',
            'is_open' => 'required|boolean',
            'start_time' => 'nullable|required_if:is_open,0|date_format:H:i',
            'end_time' => 'nullable|required_if:is_open,0|date_format:H:i|after:start_time',
        ]);

        $date = $request->input('date');
        $is_open = $request->input('is_open');

        // Verifica si el día ya está marcado como cerrado
        if ($is_open == 1 && $this->isClosedDay($date)) {
            return redirect()->back()->withErrors(['date' => 'El día seleccionado ya está cerrado.'])->withInput();
        }

        // Crea o actualiza un registro en la tabla 'days' con los datos proporcionados
        $day = Day::updateOrCreate(
            ['date' => $date],
            [
                'is_open' => $is_open,
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
            ]
        );

        // Retorna a la vista con un mensaje de éxito dependiendo si el día está abierto o cerrado
        if ($is_open) {
            return redirect()->route('days.list')->with('success', 'Día abierto creado o actualizado con éxito.');
        } else {
            return redirect()->route('days.list')->with('success', 'Día cerrado creado o actualizado con éxito.');
        }
    }

    // Actualiza una día específico en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $day = Day::findOrFail($id);

        // Actualiza el registro del día con los datos del formulario ya validados
        $day->update([
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        return redirect()->route('days.list')->with('success', 'Día actualizado con éxito.');
    }


    //Obtiene los horarios de apertura y cierre para una fecha específica.

    public function getOpeningHours($dateString)
    {
        $date = Carbon::parse($dateString);
        $dayOfWeek = $date->dayOfWeek;

        // Busca si hay un horario específico en la tabla 'days'
        $day = Day::where('date', $date)->first();

        // Valores predeterminados
        $defaultHours = [
            5 => ['start_time' => '12:00', 'end_time' => '15:00'],
            6 => ['start_time' => '12:00', 'end_time' => '16:00'],
            0 => ['start_time' => '12:00', 'end_time' => '16:00'],
        ];

        if ($day) {
            // Utiliza el horario específico si está disponible
            return [
                'start_time' => $day->start_time ?? $defaultHours[$dayOfWeek]['start_time'],
                'end_time' => $day->end_time ?? $defaultHours[$dayOfWeek]['end_time']
            ];
        } else {
            // Utiliza el horario predeterminado según el día de la semana
            return $defaultHours[$dayOfWeek] ?? [];
        }
    }


    //Lista los días abiertos y cerrados a partir de la fecha actual
    public function list()
    {
        $today = Carbon::today();

        //Obtenemos los días abiertos y cerrados
        $open = Day::where('is_open', 0)
            ->whereDate('date', '>=', $today)
            ->orderBy('date')
            ->get();

        $closed = Day::where('is_open', 1)
            ->whereDate('date', '>=', $today)
            ->orderBy('date')
            ->get();

        return view('admin.days.days_list', compact('open', 'closed'));
    }


    //Muestra la vista de edición de un día específico
    public function edit($id)
    {
        $day = Day::findOrFail($id);

        return view('admin.days.edit', compact('day'));
    }

    //Elimina un día y redirige con un mensaje de éxito.
    public function destroy(Day $day)
    {
        $day->delete();

        if ($day->is_open) {
            return redirect()->route('days.list')->with('success', 'Día cerrado eliminado con éxito.');
        } else {
            return redirect()->route('days.list')->with('success', 'Día abierto eliminado con éxito.');
        }
    }

    // Verifica si un día está cerrado, basándose en el día de la semana y la base de datos.
    private function isClosedDay($date)
    {
        $dayOfWeek = date('w', strtotime($date));

        // Verificar si es un día de la semana cerrado (martes, miércoles o jueves)
        if ($dayOfWeek >= 2 && $dayOfWeek <= 4) {
            return true;
        }

        // Verificar si el día ya existe en la base de datos como cerrado
        $day = Day::where('date', $date)->where('is_open', 0)->first();
        if ($day) {
            return true;
        }

        return false;
    }


    // Actualiza los horarios de apertura de días y redirige con un mensaje de éxito.
    public function update_horarios(Request $request)
    {
        $estado = $request->input('estado');
        $h_abierto = $request->input('h_abierto');
        $h_cerrado = $request->input('h_cerrado');

        //Actualiza los horarios para cada registro en la base de datos.
        foreach ($estado as $id => $value) {
            $horario = HorariosApertura::find($id);
            $horario->estado = $value;
            $horario->h_abierto = $h_abierto[$id];
            $horario->h_cerrado = $h_cerrado[$id];
            $horario->save();
        }

        return redirect()->back()->with('success', 'Horarios actualizados correctamente.');
    }
}
