@foreach($votes as $value)

<script>
  const ctx{{ $value->id }} = document.getElementById('{{ $value->id }}');

  new Chart(ctx{{ $value->id }}, {
    type: 'bar',
    data: {
      labels: [@foreach($value->votes as $vote)'{{ $vote->fname }} {{ $vote->lname }}',@endforeach],
      datasets: [{
        label: '# of Votes',
        data: [@foreach($value->votes as $vote){{ $vote->votecount }},@endforeach],
        borderWidth: 1,
        borderColor: '#36A2EB',
        backgroundColor: '#9BD0F5',
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
    plugins: [ChartDataLabels]
  });
  
</script>
 
  @endforeach