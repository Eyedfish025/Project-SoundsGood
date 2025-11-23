<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadesController extends Controller
{
    public function index()
    {
        // Procura por: resources/views/atividades/index.blade.php
        return view('atividades.index');
    }

    public function respiracao()
    {
        // Procura por: resources/views/atividades/respiracao.blade.php
        return view('atividades.respiracao.respiracao');
    }

    public function meditacao()
    {
        // Procura por: resources/views/atividades/meditacao.blade.php
        return view('atividades.meditacao.meditacao');
    }

    public function alongamento()
    {
        // Procura por: resources/views/atividades/alongamento/alongamento.blade.php
        return view('atividades.Alongamento.alongamento');
    }

    public function sonsCalmantes()
    {
        // Procura por: resources/views/atividades/sons-calmantes.blade.php
        return view('atividades.sons-calmantes.sons-calmantes');
    }



    public function respiracao_478()
    {
        // Procura por: resources/views/atividades/respiracao/Conteudos-respiracao/respiracao-4-7-8.blade.php
        return view('atividades.respiracao.Conteudos-respiracao.respiracao-4-7-8');
    }

    public function respiracao_Diafragmatica()
    {
        // Procura por: resources/views/atividades/respiracao/Conteudos-respiracao/respiracao-Diafragmatica.blade.php
        return view('atividades.respiracao.Conteudos-respiracao.respiracao-Diafragmatica');
    }

    public function respiracao_Alternada_Nasal()
    {
        // Procura por: resources/views/atividades/respiracao/Conteudos-respiracao/respiracao-Alternada-Nasal.blade.php
        return view('atividades.respiracao.Conteudos-respiracao.respiracao-Alternada-Nasal');
    }

    public function respiracao_Quadrada()
    {
        // Procura por: resources/views/atividades/respiracao/Conteudos-respiracao/respiracao-Quadrada.blade.php
        return view('atividades.respiracao.Conteudos-respiracao.respiracao-Quadrada');
    }



    public function alongamento_Dinamico()
    {
        // Procura por: resources/views/atividades/Conteudos-Alongamentos/alongamento-Dinamico.blade.php
        return view('atividades.Alongamento.Conteudos-Alongamentos.alongamento-Dinamico');
    }

    public function alongamento_Estatico()
    {
        // Procura por: resources/views/atividades/Conteudos-Alongamentos/alongamento-Estatico.blade.php
        return view('atividades.Alongamento.Conteudos-Alongamentos.alongamento-Estatico');
    }

    public function alongamento_Passivo()
    {
        // Procura por: resources/views/atividades/Conteudos-Alongamentos/alongamento-Passivo.blade.php
        return view('atividades.Alongamento.Conteudos-Alongamentos.alongamento-Passivo');
    }

    public function alongamento_Ativo()
    {
        // Procura por: resources/views/atividades/Conteudos-Alongamentos/alongamento-Ativo.blade.php
        return view('atividades.Alongamento.Conteudos-Alongamentos.alongamento-Ativo');
    }



    public function meditacao_Guiada()
    {
        // Procura por: resources/views/atividades/Conteudos-meditacao/Guiada.blade.php
        return view('atividades.meditacao.Conteudos-meditacao.meditacao-Guiada');
    }

    public function meditacao_Aprenda_Meditar()
    {
        // Procura por: resources/views/atividades/Conteudos-meditacao/meditacao-Aprenda-Meditar.blade.php
        return view('atividades.meditacao.Conteudos-meditacao.meditacao-Aprenda-Meditar');
    }

    public function meditacao_Controle_corpo_alma()
    {
        // Procura por: resources/views/atividades/Conteudos-meditacao/meditacao-Controle-corpo-alma.blade.php
        return view('atividades.meditacao.Conteudos-meditacao.meditacao-Controle-corpo-alma');
    }

    public function meditacao_Mantenha_Calma_3_Passos()
    {
        // Procura por: resources/views/atividades/Conteudos-meditacao/meditacao-Mantenha-Calma-3-Passos.blade.php
        return view('atividades.meditacao.Conteudos-meditacao.meditacao-Mantenha-Calma-3-Passos');
    }

    public function sons_Chuva_Leve()
    {
        // Procura por: resources/views/atividades/sons-calmantes/Conteudos-sons-calmantes/sons-Chuva-Leve.blade.php
        return view('atividades.sons-calmantes.Conteudos-sons-calmantes.sons-Chuva-Leve');
    }

    public function sons_Floresta_Tropical()
    {
        // Procura por: resources/views/atividades/sons-calmantes/Conteudos-sons-calmantes/sons-Floresta-Tropical.blade.php
        return view('atividades.sons-calmantes.Conteudos-sons-calmantes.sons-Floresta-Tropical');
    }

    public function sons_Ondas_Mar()
    {
        // Procura por: resources/views/atividades/sons-calmantes/Conteudos-sons-calmantes/sons-Ondas-Mar.blade.php
        return view('atividades.sons-calmantes.Conteudos-sons-calmantes.sons-Ondas-Mar');
    }

    public function sons_Flocos_Neve()
    {
        // Procura por: resources/views/atividades/sons-calmantes/Conteudos-sons-calmantes/sons-Flocos-Neve.blade.php
        return view('atividades.sons-calmantes.Conteudos-sons-calmantes.sons-Flocos-Neve');
    }
}
