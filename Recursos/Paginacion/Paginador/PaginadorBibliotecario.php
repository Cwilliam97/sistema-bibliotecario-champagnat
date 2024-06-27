<style>
    #Pagination
    {
        font: bold 15px Century Gothic;
        position: relative; 
        background-color: #72BD2C; 
        color: #FFFFFF;
        padding: 4px; 
        border: 1px solid #0F97BD; 
        text-decoration: none; 
        margin: 2px; 
        float: left;
        border-radius: 6px;
        left: 47%;
    }

    #Pagination:hover
    {
        background-color: #0F97BD;
    }
</style>

<?php

class Paginador {

    private $pagina;
    private $registros;
    private $inicio;
    private $total_registros;
    private $resultados;
    private $total_paginas;
    private $term_link;
    private $path;
    private $cabecera_table = "";
    private $footer_table = "";
    private $links = true;
    private $npagina = "pagina";

    public function __construct($pagina, $registros = 10, $links = true) {
        $this->registros = $registros;
        $this->pagina = $pagina;
        $this->links = $links;
        if (!$this->pagina) {
            $this->inicio = 0;
            $this->pagina = 1;
        } else {
            $this->inicio = ($this->pagina - 1) * $this->registros;
        }
    }

    private function links() {
        $html = "";
        if ($this->total_registros) {

            $html .= "<center><div class='links'>";

            if (($this->pagina - 1) > 0) { /* Anterior pal */
                $html .= " <a id='Pagination' href='?{$this->path}&{$this->npagina}=" . ($this->pagina - 1) . "&{$this->term_link}'><p>Anterior</p></a>";
            }

            for ($i = 1; $i <= $this->total_paginas; $i++) {
                if ($this->pagina == $i) {
                    $html .= "<b id='Pagination'>" . $this->pagina . "</b> "; /* Actual */
                } else {
                    $html .= "<a class='f' id='Pagination' href='?{$this->path}&{$this->npagina}=$i&{$this->term_link}'>$i</a> ";
                } /* Siguiente numero */
            }

            if (($this->pagina + 1) <= $this->total_paginas) {
                $html .= " <a id='Pagination' href='?{$this->path}&{$this->npagina}=" . ($this->pagina + 1) . "&{$this->term_link}'><p>Siguiente</p></a>";
            } /* Siguient Palabra */

            $html .= "</div></center> <br><br>";
        }

        return $html;
    }

    public function contenido($resultados, $total_registros, $cbk) {
        $this->resultados = $resultados;
        $this->total_registros = $total_registros;
        $this->total_paginas = ceil($this->total_registros / $this->registros);

        $html = "<div class='paginador'>";
        if ($this->total_registros) {
            if ($this->cabecera_table !== "") {
                $html .= $this->cabecera_table;
            }
            foreach ($this->resultados as $key => $row) {
                $html .= $cbk($row);
            }
            if ($this->cabecera_table !== "") {
                $html .= $this->footer_table;
            }
            if ($this->links) {
                $html.="<br>";
                $html .= $this->links();
            }
        } else {
            $html .= "<p class='SinResultados'>(No Hay Resultados Que Mostrar)</p>";
        }
        $html.="</div>";
        return $html;
    }

    function setCabeceraTable($ctable) {
        $this->cabecera_table = $ctable;
    }

    function setFooterTable($ftable) {
        $this->footer_table = $ftable;
    }

    function getTerm_link() {
        return $this->term_link;
    }

    function getPath() {
        return $this->path;
    }

    function setTerm_link($term_link) {
        $this->term_link = $term_link;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function getPagina() {
        return $this->pagina;
    }

    function getRegistros() {
        return $this->registros;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getTotal_registros() {
        return $this->total_registros;
    }

    function getResultados() {
        return $this->resultados;
    }

    function getTotal_paginas() {
        return $this->total_paginas;
    }

    function getNpagina() {
        return $this->npagina;
    }

    function setNpagina($npagina) {
        $this->npagina = $npagina;
    }

}
