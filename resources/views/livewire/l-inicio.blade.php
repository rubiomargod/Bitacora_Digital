<div class="mx-auto" style="max-width: 90%;">
  <div style="margin-top: 30px;">
    <h2 class="text-center mb-4">Bienvenido</h2>
    <div class="row">
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="bg-light border rounded p-3 text-center">
          <h5 class="text-primary"><i class="bi bi-person-fill me-2"></i> Cantidad de Maestros</h5>
          <p class="h3 fw-bold">{{ $cantidadMaestros }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-light border rounded p-3 text-center">
          <h5 class="text-success"><i class="bi bi-mortarboard-fill me-2"></i> Cantidad de Alumnos</h5>
          <p class="h3 fw-bold">{{ $cantidadAlumnos }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Contenedor con tamaño controlado para la gráfica --}}
  <div class="mt-4" style="position: relative; height: 300px; width: 100%;">
    <canvas id="graficaReportes"></canvas>
  </div>

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const ctx = document.getElementById('graficaReportes')?.getContext('2d');
      if (!ctx) return;

      // Datos combinados en formato {x: fecha, y: total}
      const fechas = @json($fechas);
      const totales = @json($totales);
      const datosScatter = fechas.map((fecha, index) => ({
        x: fecha,
        y: totales[index]
      }));

      const grafica = new Chart(ctx, {
        type: 'scatter',
        data: {
          datasets: [{
            label: 'Reportes por día',
            data: datosScatter,
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            pointRadius: 5
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              type: 'time',
              time: {
                unit: 'day',
                tooltipFormat: 'yyyy-MM-dd',
                displayFormats: {
                  day: 'yyyy-MM-dd'
                }
              },
              title: {
                display: true,
                text: 'Fecha'
              }
            },
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Cantidad de reportes'
              }
            }
          }
        }
      });
    });
  </script>
  @endpush
</div>