<div class="wrapper indent-top">
    <div class="grid_5 suffix_1 omega">
        <?php
        $menu = Menu::singleton();
        echo $menu->getMenuLateral();
        ?>
    </div>
    <article class="grid_16 suffix_1 prefix_1 alpha">
        <h2>Boletinas</h2>
        <?php
        $pagina = @$_REQUEST["pagina"];
        $paginador = new Paginador($pagina);
        $inicio = $paginador->getInicio();
        $registros = $paginador->getRegistros();
        
        $path = "opt={$_REQUEST["opt"]}&subopt={$_REQUEST["subopt"]}";
        $paginador->setPath($path);

        $mBoletin = Boletin::singleton();
        $r = $mBoletin->getPaginador($inicio, $registros,1);

        $cbk = function($row) {
            $html = "";

            $html .= "
            <article class='item_list'>
                <div>
                    <a target='_blank' href='{$row->url_archivo}'>
                        {$row->titulo} 
                    </a>
                    <time>{$row->fecha}</time>
                </div>
                <p>
                    {$row->descripcion}
                </p>
            </article>";

            return $html;
        };

        echo $paginador->contenido($r->data->rows, $r->data->count, $cbk);
        //
        ?>
    </article>
</div>