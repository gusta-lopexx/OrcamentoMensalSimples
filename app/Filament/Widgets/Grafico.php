<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Grafico extends ChartWidget
{

    protected static ?string $heading = 'Gráfico de Receitas e Despesas';
    protected static ?string $maxHeight = '400px';


    protected function getData(): array
    {
        $mesAtual = now()->month;
        $anoAtual = now()->year;

        $TotalReceitas = \App\Models\Receitas::whereMonth('data', $mesAtual)
            ->whereYear('data', $anoAtual)
            ->sum('valor');

        $TotalDespesas = \App\Models\Despesas::whereMonth('data', $mesAtual)
            ->whereYear('data', $anoAtual)
            ->sum('valor');

        return [
            'datasets' => [
                [
                    'label' => 'Total de Receitas',
                    'data' => [$TotalReceitas],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Total de Despesas',
                    'data' => [$TotalDespesas],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => ['Mês Atual'],
        ];
    }

    protected function getType(): string
    {
        // Return the chart type, e.g., 'line', 'bar', etc.
        return 'bar';
    }

    public function getColumnSpan(): int|string|array
    {
        // Define the column span for the widget
        return 'full';
    }


}
