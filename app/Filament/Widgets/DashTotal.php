<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashTotal extends BaseWidget
{
    protected function getStats(): array
    {
        $mesAtual = now()->month;
        $anoAtual = now()->year;

        $TotalReceitas = \App\Models\Receitas::whereMonth('data', $mesAtual)
            ->whereYear('data', $anoAtual)
            ->sum('valor');

        $TotalDespesas = \App\Models\Despesas::whereMonth('data', $mesAtual)
            ->whereYear('data', $anoAtual)
            ->sum('valor');

        $saldo = $TotalReceitas - $TotalDespesas;

        return [
            
            Stat::make(
                'Total de Receitas',
                'R$ ' . number_format($TotalReceitas, 2, ',', '.')
            )
                ->description('Valor total de todas as receitas registradas.')
                ->icon('heroicon-o-arrow-trending-up')
                ->color('success'),

            Stat::make(
                'Total de Despesas',
                'R$ ' . number_format($TotalDespesas, 2, ',', '.')
            )
                ->icon('heroicon-o-arrow-trending-down')
                ->color('danger')
                ->description('Total acumulado de despesas no período selecionado.')
                ->descriptionIcon('heroicon-o-calendar'),

            

            Stat::make(
                    'Saldo', 
                    'R$ ' . number_format(($TotalReceitas - $TotalDespesas), 2, ',', '.'))
                ->icon('heroicon-o-currency-dollar')
                ->color($TotalReceitas - $TotalDespesas >= 0 ? 'success' : 'danger')
                ->description('Saldo total considerando receitas e despesas.')
                ->label('Saldo Atual'),
       
        ];
    }
}
