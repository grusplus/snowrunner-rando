<?php use Cake\Core\Configure; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Title</h4>
                    <p class="category">Subtitle</p>
                </div>
                <div class="content">
                    <p>Content</p>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="display:none;">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h4 class="title">Email Statistics <i class="fa fa-pie-chart pull-right"></i></h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="content">
                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        // Script for the chart above
        $(document).ready(function(){

            var dataPreferences = {
                series: [
                    [25, 30, 20, 25]
                ]
            };

            var optionsPreferences = {
                donut: true,
                donutWidth: 40,
                startAngle: 0,
                total: 100,
                showLabel: false,
                axisX: {
                    showGrid: false
                }
            };

            Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

            Chartist.Pie('#chartPreferences', {
              labels: ['62%','32%','6%'],
              series: [62, 32, 6]
            });

        });
        </script>

        <div class="col-md-8">
            <div class="card ">
                <div class="header">
                    <h4 class="title">Tasks</h4>
                    <p class="category">Backend development</p>
                </div>
                <div class="content">
                    <div class="table-full-wi">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox">
                                        </label>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                        </label>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="footer">
                        <hr class="mt-0">
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>