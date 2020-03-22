@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('flash::message')
            <div class="row">
            <div class="col-md-12">
                <h1>Ventana principal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Today
                                    Revenue</span>
                                <h2 class="mb-0">$2189</h2>
                            </div>
                            <div class="align-self-center" style="position: relative;">
                                <div id="today-revenue-chart" class="apex-charts" style="min-height: 45px;"><div id="apexcharts5jy0bh7d" class="apexcharts-canvas apexcharts5jy0bh7d light" style="width: 90px; height: 45px;"><svg id="SvgjsSvg1545" width="90" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1547" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1546"><clipPath id="gridRectMask5jy0bh7d"><rect id="SvgjsRect1552" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask5jy0bh7d"><rect id="SvgjsRect1553" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1559" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1560" stop-opacity="0.45" stop-color="rgba(114,124,245,0.45)" offset="0.45"></stop><stop id="SvgjsStop1561" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop1562" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1551" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1565" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1566" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g></g><g id="SvgjsG1569" class="apexcharts-grid"><line id="SvgjsLine1571" x1="0" y1="45" x2="90" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1570" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1555" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1556" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1563" d="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" fill="url(#SvgjsLinearGradient1559)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask5jy0bh7d)" pathTo="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><path id="SvgjsPath1564" d="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" fill="none" fill-opacity="1" stroke="#727cf5" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask5jy0bh7d)" pathTo="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><g id="SvgjsG1557" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1577" r="0" cx="0" cy="0" class="apexcharts-marker wud1ful6b no-pointer-events" stroke="#ffffff" fill="#727cf5" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1558" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1572" x1="0" y1="0" x2="90" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1573" x1="0" y1="0" x2="90" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1574" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1575" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1576" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1550" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1567" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1568" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(114, 124, 245);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <span class="text-success font-weight-bold font-size-13"><i class="uil uil-arrow-up"></i> 10.21%</span>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 91px; height: 67px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Product
                                    Sold</span>
                                <h2 class="mb-0">1065</h2>
                            </div>
                            <div class="align-self-center" style="position: relative;">
                                <div id="today-product-sold-chart" class="apex-charts" style="min-height: 45px;"><div id="apexchartsymchajbv" class="apexcharts-canvas apexchartsymchajbv light" style="width: 90px; height: 45px;"><svg id="SvgjsSvg1581" width="90" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1583" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1582"><clipPath id="gridRectMaskymchajbv"><rect id="SvgjsRect1588" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskymchajbv"><rect id="SvgjsRect1589" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1595" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1596" stop-opacity="0.45" stop-color="rgba(247,126,83,0.45)" offset="0.45"></stop><stop id="SvgjsStop1597" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop1598" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1587" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1601" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1602" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g></g><g id="SvgjsG1605" class="apexcharts-grid"><line id="SvgjsLine1607" x1="0" y1="45" x2="90" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1606" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1591" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1592" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1599" d="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" fill="url(#SvgjsLinearGradient1595)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskymchajbv)" pathTo="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><path id="SvgjsPath1600" d="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" fill="none" fill-opacity="1" stroke="#f77e53" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskymchajbv)" pathTo="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><g id="SvgjsG1593" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1613" r="0" cx="0" cy="0" class="apexcharts-marker wgya51t8 no-pointer-events" stroke="#ffffff" fill="#f77e53" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1594" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1608" x1="0" y1="0" x2="90" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1609" x1="0" y1="0" x2="90" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1610" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1611" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1612" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1586" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1603" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1604" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(247, 126, 83);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <span class="text-danger font-weight-bold font-size-13"><i class="uil uil-arrow-down"></i> 5.05%</span>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 91px; height: 67px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                    Customers</span>
                                <h2 class="mb-0">11</h2>
                            </div>
                            <div class="align-self-center" style="position: relative;">
                                <div id="today-new-customer-chart" class="apex-charts" style="min-height: 45px;"><div id="apexchartshi8eimnf" class="apexcharts-canvas apexchartshi8eimnf light" style="width: 90px; height: 45px;"><svg id="SvgjsSvg1617" width="90" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1619" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1618"><clipPath id="gridRectMaskhi8eimnf"><rect id="SvgjsRect1624" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskhi8eimnf"><rect id="SvgjsRect1625" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1631" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1632" stop-opacity="0.45" stop-color="rgba(67,211,158,0.45)" offset="0.45"></stop><stop id="SvgjsStop1633" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop1634" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1623" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1637" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1638" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g></g><g id="SvgjsG1641" class="apexcharts-grid"><line id="SvgjsLine1643" x1="0" y1="45" x2="90" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1642" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1627" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1628" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1635" d="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" fill="url(#SvgjsLinearGradient1631)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskhi8eimnf)" pathTo="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><path id="SvgjsPath1636" d="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" fill="none" fill-opacity="1" stroke="#43d39e" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskhi8eimnf)" pathTo="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><g id="SvgjsG1629" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1649" r="0" cx="0" cy="0" class="apexcharts-marker wk6tutahc no-pointer-events" stroke="#ffffff" fill="#43d39e" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1630" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1644" x1="0" y1="0" x2="90" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1645" x1="0" y1="0" x2="90" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1646" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1647" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1648" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1622" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1639" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1640" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(67, 211, 158);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <span class="text-success font-weight-bold font-size-13"><i class="uil uil-arrow-up"></i> 25.16%</span>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 91px; height: 67px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="media p-3">
                            <div class="media-body">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                    Visitors</span>
                                <h2 class="mb-0">750</h2>
                            </div>
                            <div class="align-self-center" style="position: relative;">
                                <div id="today-new-visitors-chart" class="apex-charts" style="min-height: 45px;"><div id="apexcharts8pshvzb5k" class="apexcharts-canvas apexcharts8pshvzb5k light" style="width: 90px; height: 45px;"><svg id="SvgjsSvg1653" width="90" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1655" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1654"><clipPath id="gridRectMask8pshvzb5k"><rect id="SvgjsRect1660" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask8pshvzb5k"><rect id="SvgjsRect1661" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1667" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1668" stop-opacity="0.45" stop-color="rgba(255,190,11,0.45)" offset="0.45"></stop><stop id="SvgjsStop1669" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop1670" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1659" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1673" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1674" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g></g><g id="SvgjsG1677" class="apexcharts-grid"><line id="SvgjsLine1679" x1="0" y1="45" x2="90" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1678" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1663" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1664" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1671" d="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" fill="url(#SvgjsLinearGradient1667)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8pshvzb5k)" pathTo="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><path id="SvgjsPath1672" d="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" fill="none" fill-opacity="1" stroke="#ffbe0b" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8pshvzb5k)" pathTo="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><g id="SvgjsG1665" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1685" r="0" cx="0" cy="0" class="apexcharts-marker wz4q8s84y no-pointer-events" stroke="#ffffff" fill="#ffbe0b" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1666" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1680" x1="0" y1="0" x2="90" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1681" x1="0" y1="0" x2="90" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1682" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1683" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1684" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1658" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1675" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1676" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 190, 11);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <span class="text-danger font-weight-bold font-size-13"><i class="uil uil-arrow-down"></i> 5.05%</span>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 91px; height: 67px;"></div></div><div class="contract-trigger"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notificaciones<a href="#" data-toggle="modal" data-target="#crearNotficacion" class="btn btn-success">Nueva</a></div>
                    <div class="card-body">
                        @foreach($notificaciones as $key)
                        <h4>{{$key->titulo}}</h4>
                            <div class="row">
                                <div class="col-md-10">
                                    <p>{{$key->motivo}}</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown align-self-center float-right">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-177px, 20px, 0px);">
                                            <!-- item-->
                                            <!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editarNotificacion"><i class="uil uil-edit-alt mr-2"></i>Editar</a> -->
                                            <!-- item-->
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="{{ route('eliminarNotificacion', $key->id)}}" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <hr>
                        @endforeach()
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Noticias <a href="#" data-toggle="modal" data-target="#crearNoticia" class="btn btn-success">Nueva</a></div>
                    <div class="card-body">
                        @foreach($noticias as $key)
                        <h4>{{$key->titulo}}</h4>
                            <div class="row">
                                <div class="col-md-10">
                                    <p>{{$key->contenido }}</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown align-self-center float-right">
                                        <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-177px, 20px, 0px);">
                                            <!-- item-->
                                            <!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editarNoticia" ><i class="uil uil-edit-alt mr-2"></i>Editar</a> -->
                                            <!-- item-->
                                            <div class="dropdown-divider"></div>
                                            <!-- item-->
                                            <a href="{{ route('eliminarNoticia', $key->id)}}" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <hr>
                        @endforeach()
                    </div>
                </div>
            </div>
        </div>




        <!-- -----------------------------------------------MODALES -------------------------------------->
        <form action="{{ route('noticias.store') }}" method="POST" name="registrar_noticia" data-parsley-validate>
            @csrf
            <div class="modal fade" id="crearNoticia" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Nueva Noticia</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <input type="text" name="titulo" placeholder="Título" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="contenido" placeholder="Contenido" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('notificaciones.store') }}" method="POST" name="registrar_notificacion" data-parsley-validate>
            @csrf
            <div class="modal fade" id="crearNotficacion" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Nueva Notificación</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <input type="text" name="titulo" placeholder="Título" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="motivo" placeholder="Motivo" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection

@section('scripts')
    <script>
    $(function () {
      $('select').each(function () {
        $(this).select2({
          theme: 'bootstrap4',
          width: 'style',
          placeholder: $(this).attr('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
        });
      });
    });
    </script>
@endsection


