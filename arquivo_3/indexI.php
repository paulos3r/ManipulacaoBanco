<?php
// Uma classe não deve ser forçada a implementar interfaces e métodos que não irão utilizar.
interface Aves{
    public function setLocalizacao($lat, $lng);
    public function render();
}

interface AvesQueVoam extends Aves{
    public function setAltitude($alt);
}

class Papagaio implements AvesQueVoam{
    public function setLocalizacao($lat, $lng){}
    public function render(){}
    public function setAltitude($alt){}
}

class Pinguim implements Aves{
    public function setLocalizacao($lat, $lng){}
    public function render(){}
}