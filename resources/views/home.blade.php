@extends('layout.app')

@section('content')
<div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose Month
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{route('home')}}?month=1">January</a></li>
            <li><a href="{{route('home')}}?month=2">February</a></li>
            <li><a href="{{route('home')}}?month=3">March</a></li>
            <li><a href="{{route('home')}}?month=4">April</a></li>
            <li><a href="{{route('home')}}?month=5">May</a></li>
            <li><a href="{{route('home')}}?month=6">June</a></li>
            <li><a href="{{route('home')}}?month=7">July</a></li>
            <li><a href="{{route('home')}}?month=8">August</a></li>
            <li><a href="{{route('home')}}?month=9">September</a></li>
            <li><a href="{{route('home')}}?month=10">October</a></li>
            <li><a href="{{route('home')}}?month=11">November</a></li>
            <li><a href="{{route('home')}}?month=12">December</a></li>
        </ul>
    </div>
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script defer>
    const ctx = document.getElementById('myChart')

    const fees = @json($fees->toArray());

    if (fees.length > 0) {
        const otherFees = []
        const electricFees = []
        const waterFees = []
        const managementFees = []
        const parkingFees = []
        const properties = []
        fees.forEach(fee => {
            otherFees.push(fee.other_fee)
            electricFees.push(fee.electric_fee)
            waterFees.push(fee.water_fee)
            managementFees.push(fee.management_fee)
            parkingFees.push(fee.parking_fee)
            properties.push(`Room: ${fee.property.property_number} ${fee.property.type}`)
        })
        const labels = properties
        const data = {
            labels: labels,
            datasets: [{
                    label: 'Electric Fee',
                    data: electricFees,
                },
                {
                    label: 'Water Fee',
                    data: waterFees,
                },
                {
                    label: 'Management Fee',
                    data: managementFees,
                },
                {
                    label: 'Parking Fee',
                    data: parkingFees,
                },
                {
                    label: 'Other Fee',
                    data: otherFees,
                },
            ]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Dashboard'
                    },
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        };
        new Chart(ctx, config);
    } else {
        alert("Không có dữ liệu trong tháng này")
    }
</script>
@endsection