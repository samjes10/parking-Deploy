<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_generarTabla()
    {
        $htmlEsperado = '<div class="fila"><button class="btn-espacio">P-E-1</button><button class="btn-espacio">P-E-2</button></div><div class="fila"><button class="btn-espacio">P-E-3</button><button class="btn-espacio">P-E-4</button></div>';

        $this->expectOutputString($htmlEsperado);
        
        generarTabla(2, 2);
    }
}
