<?php

$buscar = $_POST['b'];
  
      $while="";  
      
      if(!empty($buscar)) {
            buscar($buscar);
            $while="WHERE libNombre LIKE '%".$b."%' ";
      }
        
      function buscar($b) {
            $con = mysql_connect('localhost','root', '');
            mysql_select_db('champagnat', $con);
        
            $sql = mysql_query("SELECT * FROM libros '".$while."'" ,$con);
              
            $contar = @mysql_num_rows($sql);
              
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
              while($row=mysql_fetch_array($sql)){
                $codigo=$row['libCodigo'];
                $titulo=$row['libTitulo'];
                $autor=$row['libAutor'];
                $cantidad=$row['libCantidad'];
                $editorial=$row['libEditorial'];
                $estado=$row['libEstado'];
          
                
                echo '<table class="table-fill">';
                echo '<thead>';
                echo '<tr>';
                echo '<th class="text-left">Codigo</th>';
                echo '<th class="text-left">Titulo</th>';
                echo '<th class="text-left">Autor</th>';
                echo '<th class="text-left">Cantidad</th>';
                echo '<th class="text-left">Editorial</th>';
                echo '<th class="text-left">Estado</th>';
//                echo '<th class="text-left">Actualizar</th>';
//                echo '<th class="text-left">Desactivar</th>';
                echo '</tr>';
                echo '</thead>';
                
                echo '<tbody class="table-hover">';
                echo '<tr>';
                echo '<td class="text-left">'.$codigo.'</td>';
                echo '<td class="text-left">'.$titulo.'</td>';
                echo '<td class="text-left">'.$autor.'</td>';
                echo '<td class="text-left">'.$cantidad.'</td>';
                echo '<td class="text-left">'.$editorial.'</td>';
                echo '<td class="text-left">'.$estado.'</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
              
            }
        }
  }
  
  ?>



                <tbody class="table-hover">
                    <tr>
                        <td class="text-left"><?php echo $libro->libCodigo ?></td>
                        <td class="text-left"><?php echo $libro->libNombre ?></td>
                        <td class="text-left"><?php echo $libro->libAutor ?></td>
                        <td class="text-left"><?php echo $libro->libCantidad ?></td>
                        <td class="text-left"><?php echo $libro->libEditorial ?></td>
                        <td class="text-left"><?php echo $libro->libEstado ?></td>
                        <td class="text-left"><a href="index.php?pag=frmActualizarLibro&idLibro=<?php echo $libro->idLibro ?>"><img src="../../Recursos/Imagenes/VistaBibliotecario/actualizacion.png" width="30" height="30"></a></td>
                        <td class="text-left"><a href="../../Control/controladorLibro.php?opcion=3&idLibro=<?php echo $libro->idLibro ?>"><img src="../../Recursos/Imagenes/VistaBibliotecario/desactivar.png" width="30" height="30"></a></td>
                    </tr>

            </tbody>
        </table>