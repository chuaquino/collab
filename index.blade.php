@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Meal Orders</h1>
    </div>
  </div>

<div id= {{ $divid }} class="dvcalendar">
    <table class='table table-bordered' style="table-layout: fixed;">
      <tr>
        <th colspan= {{$NUMBER_OF_COLUMNS}} class="text-center"> {{ $title }} {{ $year }} </th>
      </tr>

      <tr>
         @foreach($weekDays as $key => $weekDay)
           <td class="text-center">{{ $weekDay }}</td>
         @endforeach
      </tr>

      <tr>
        @for($i = 0; $i < $blank; $i++)>
            <td></td>
       @endfor

       @for($i = 1; $i <= $daysInMonth; $i++)
          @if($day == $i)
            <td><strong>{{ $i }} </strong></td>
          @else
            <td>{{ $i }}</td>
          @endif

          @if(($i + $blank) % $NUMBER_OF_COLUMNS == 0)
            </tr><tr>
          @endif
       @endfor

       @for($i = 0; ($i + $blank + $daysInMonth) % $NUMBER_OF_COLUMNS != 0; $i++)
         <td></td>
       @endfor
    </tr>
  </table>
</div>


{{--<div id="exTab1" class="container">
<ul  class="nav nav-tabs">
			<li class="active">
        <a  href="#1a" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2a" data-toggle="tab">Using nav-pills</a>
			</li>
			<li><a href="#3a" data-toggle="tab">Applying clearfix</a>
			</li>
  		<li><a href="#4a" data-toggle="tab">Background color</a>
			</li>
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1a">
          <h3>Content's background color is the same for the tab</h3>
				</div>
				<div class="tab-pane" id="2a">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
				</div>
        <div class="tab-pane" id="3a">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
				</div>
          <div class="tab-pane" id="4a">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
				</div>
			</div>
  </div>--}}

@stop
