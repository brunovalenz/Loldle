<?php

namespace App\Service;

interface ServiceInterface{

    public function index($pesquisar, $perPage);
    
    public function store($request);

    public function show(string $id);

    public function update($request, string $id);

    public function destroy(string $id);
    
}