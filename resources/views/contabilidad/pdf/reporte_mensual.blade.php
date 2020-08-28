<html>
<head>
  @yield('css')
  <style>
    body{
      font-family: sans-serif;
    }
    
    header { 

    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    a {
      text-decoration: none;
      color: black;
    }

    table td {
      padding: 5px;
    }
    th {
      text-align: center;
    }
    .logo {
      width: 150px;
      height: 62px;
    }

    .text-right {
      text-align: right;
    }
  </style>
<body>
  <div class="content">
    <p align="center">
      <!-- <?php $image_path = '/assets/img/bienen.jpg'; ?> -->
       <table width="100%" border="1" cellpadding="0" cellspacing="0" style="margin-bottom: 10px; ">
          <tr>
            <!-- <th rowspan="3"><img src="{{ public_path() . $image_path }}" class="logo"></th> -->
            <th colspan="3">REPORTE MENSUAL DEL BALANCE GENERAL</th>
          </tr>
         <tr>
           <th>Area:</th>
           <th>Preparado.</th>
           <th>N° de contrato:</th>
         </tr>
         <tr>
           <th>Fecha:</th>
           <th>Aprobado:</th>
           <th>Revisión:</th>
         </tr>
       </table>
      <p align="right">Fecha: <?php echo date('d/m/Y h:m A'); ?></p>
    </p>
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
      <thead>
      <tr>
        <th>#</th>
        <th>Task</th>
        <th>Date</th>
        <th>Duración proyecta</th>
        <th>Cant. Personas</th>
        <th>Duración Real</th>
        <th>Día</th>
        <th>Type</th>
        <th>Realizada SI/NO</th>
        <th>Avances del turno y pendientes</th>
        <th>Observaciones/Comentarios</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td colspan="3" style="background: yellow;">area</td>
        <td colspan="8" style="background: yellow; text-align: center;">area</td>
      </tr>
      @php $num=1; @endphp
      @if($total_mie>0)
      @foreach($act_mie as $key)
      @if($key->dia=="Mié")
        <tr>
          <td>{{$num++}}</td>
          <td>{{$key->task}}</td>
          <td>{{$key->fecha_vencimiento}}</td>
          <td>{{$key->duracion_pro}}</td>
          <td>{{$key->cant_personas}}</td>
          <td>{{$key->duracion_real}}</td>
          <td>{{$key->dia}}</td>
          <td>{{$key->tipo}}</td>
          <td>{{$key->realizada}}</td>
          <td>{{$key->observacion1}}</td>
          <td>{{$key->observacion2}}</td>
        </tr>
      @endif
      @endforeach
      <tr style="background: black; color: white;">
        <td colspan="3">Total</td>
        <td>0</td>
        <td></td>
        <td>0</td>
        <td colspan="5"></td>
      </tr>
      <tr>
        <td colspan="3" style="background: yellow;">area</td>
        <td colspan="8" style="background: yellow; text-align: center;">area</td>
      </tr>
      <tr>
        <td colspan="11"></td>
      </tr>
      @endif      
      </tbody>
    </table>
  </div>
</body>
</html>


