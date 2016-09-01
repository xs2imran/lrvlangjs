@extends('layouts.main')

@section('content')

<h1>Laravel Assessment Exercise!</h1>

<p>
    Welcome to the Laravel Assessment Exercise. We're glad to have you here!
</p>

<p>
    Please follow any instructions in the readme.md file in the root of this repository.
</p>

<h2>We're here to <span ng-click="vm.hint()">help!</span></h2>

<p>
    If you have any questions about the assignment, please reach out to your recruitment contact.
</p>

<p ng-cloak ng-if="vm.showHint">
    @{{ vm.aHint }}
</p>


<hr>

<div ng-controller="Navigate as nav" class="collapse navbar-collapse">
    <div style="float: right;">
        <ul class="nav nav-pills">
            <li ng-class="{ active: nav.currentTab === 'home'}" ng-click="nav.setTab(nav.navName.home)" role="presentation" class="active"><a href="#home">Calculator</a></li>
            <li ng-class="{ active: nav.currentTab === 'help'}" ng-click="nav.setTab(nav.navName.help)" role="presentation"><a href="#help">Help!</a></li>
        </ul>
    </div>

    <div ng-if="nav.currentTab == 'home'">
        <div ng-controller="TempCalculator as vm">
            <div class="container-fluid">

                <div class="row">
                    <div id="message" class="col-md-offset-3 col-md-6"><h5 ng-bind="vm.message"></h5></div>
                </div>
                <br />

                <div class="row">

                    <table align="center" class="table table-hover">
                        <tr>
                            <td>Fahrenheit</td>
                            <td><input type="number" ng-model="vm.fahrenheit" ng-blur="vm.toCelsius()"></td>
                        </tr>
                        <tr>
                            <td>Celsius</td>
                            <td><input type="number" ng-model="vm.celsius" ng-blur="vm.toFahrenheit()"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn btn-primary" ng-click="vm.logTemp()"><span>Save</span></button></td>
                        </tr>
                    </table>
                </div>



            </div>
        </div>
    </div>

    <div ng-if="nav.currentTab == 'help'">
        <div ng-controller="Help as vm">
            <div class="container-fluid">

                <div class="row">
                    <table class="table table-hover">
                        <tr>
                            <td>Please use Menu for Navigation</td>
                        </tr>
                        <tr>
                            <td>Input Fahrenheit, once you lose focus, it will be automatically converted to Celsius</td>
                        </tr>
                        <tr>
                            <td>Input Celsius, once you lose focus, it will be automatically converted to ahrenheit</td>
                        </tr>
                        <tr>
                            <td>click Save and that's all</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>



@endsection