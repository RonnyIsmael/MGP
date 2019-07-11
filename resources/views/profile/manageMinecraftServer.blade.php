@extends('layouts.master')
<link href="{{ asset('/css/manageMinecraftServer.css') }}" rel="stylesheet">

@section('content')
    @csrf
        <div class="row mt-5">
            <div class="alert alert-info" id="alertMessage">
                Minecraft RCON
            </div>
            <div id="consoleRow">
                <div class="panel panel-default" id="consoleContent">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><span class="glyphicon glyphicon-console"></span> Console</h3>
                        <div class="btn-group btn-group-xs pull-right">
                            <a class="btn btn-default" href="http://minecraft.gamepedia.com/Commands"
                               target="_blank"><span class="glyphicon glyphicon-question-sign"></span><span
                                    class="hidden-xs"> Commands</span></a>
                            <a class="btn btn-default" href="http://www.minecraftinfo.com/idlist.htm"
                               target="_blank"><span class="glyphicon glyphicon-info-sign"></span><span
                                    class="hidden-xs"> Items IDs</span></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group" id="groupConsole"></ul>
                    </div>
                </div>
                <div class="input-group" id="consoleCommand">
        <span class="input-group-addon">
          <input id="chkAutoScroll" type="checkbox" checked="true" autocomplete="off"/><span
                class="glyphicon glyphicon-arrow-down"></span>
        </span>
                    <div id="txtCommandResults"></div>
                    <input type="text" class="form-control" id="txtCommand"/>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" id="btnSend"><span
                                class="glyphicon glyphicon-send"></span><span class="hidden-xs"> Send</span></button>
                        <button type="button" class="btn btn-warning" id="btnClearLog"><span
                                class="glyphicon glyphicon-erase"></span><span class="hidden-xs"> Clear</span></button>
                    </div>
                </div>
            </div>


        </div>



    <script src="{{ asset('/lib/Jquery/dist/jquery.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/jqueryUI/jquery-ui-1.12.0.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/PopperJs/popperjs.min.js') }}" rel="script"></script>
    <script src="{{ asset('/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}" rel="script"></script>
    <script src="{{ asset('/js/manageMinecraftServer.js') }}" rel="script"></script>
    <script type="text/javascript">
        if (jQuery) {
            alert("jQuery esta cargado");
        } else {
            alert("jQuery no esta cargado");
        }</script>
@stop
