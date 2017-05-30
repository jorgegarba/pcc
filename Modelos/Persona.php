<?php
class Persona
{
    // Declaración de una propiedad
    public $id_per;
    public $nom_per;
    public $ape_per;
    public $dni_per;
    public $fec_nac_per;
    public $sex_per;
    public $email_per;
    public $cel_per;
    public $dir_per;
    public $log_per;
    public $pass_per;
    public $id_tipo_per;

    // Declaración de un método
    public function mostrarVar() {
        echo $this->var;
    }
}
?>