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
}
