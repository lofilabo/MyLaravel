
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/st/theme.css">


	<button type="button" class="clicky btn btn-secondary" data-dismiss="modal">Close</button>

		<div id="thresholds" class="row"><div id="example7" class="square-section col"></div><div class="col-12 input-section"><div id="grid" class="row">	<div id="gridDemo" class="col">	</div></div>


		<div id="nested" class="row">
		
			<h4 class="col-12">Nested Sortables Example</h4>
		
			<div id="nestedDemo" class="list-group col nested-sortable">
				<div class="list-group-item nested-1">Item 1.1
					<div class="list-group nested-sortable" id="nextItemInList">
						<div class="list-group-item nested-2">Item 2.1</div>
						<div class="list-group-item nested-2">Item 2.2
							<div class="list-group nested-sortable">
								<div class="list-group-item nested-3" id="aLowLevelListItem">Item 3.1</div>
								<div class="list-group-item nested-3">Item 3.2</div>
								<div class="list-group-item nested-3">Item 3.3</div>
								<div class="list-group-item nested-3">Item 3.4</div>
							</div>
						</div>
						<div class="list-group-item nested-2">Item 2.3</div>
						<div class="list-group-item nested-2">Item 2.4</div>
					</div>
				</div>
				<div class="list-group-item nested-1"  id="veryTopOfList">Item 1.2</div>
				<div class="list-group-item nested-1">Item 1.3</div>
				<div class="list-group-item nested-1">Item 1.4
					<div class="list-group nested-sortable">
						<div class="list-group-item nested-2">Item 2.1</div>
						<div class="list-group-item nested-2">Item 2.2</div>
						<div class="list-group-item nested-2">Item 2.3</div>
						<div class="list-group-item nested-2">Item 2.4</div>
					</div>
				</div>
				<div class="list-group-item nested-1">Item 1.5</div>
			</div>

		</div>
	</div>

<script>

          $( '.clicky' ).click( function(e){
            console.log("Heere");
            innercontentsLHS_HTML = $("#nestedDemo").html();
            console.log(innercontentsLHS_HTML);
          } );


</script>


<div style="display:none;">
<div id="filter" class="row"><div id="example6" class="list-group col"></div>
<div style="padding: 0" class="col-12">
<pre class="prettyprint">new Sortable(example6, {
filter: '.filtered', // 'filtered' class is not draggable
animation: 150
});</pre>
</div>
</div>
<form>
<div class="form-group row">
<div class="col-sm-8 col-form-label">
<input min="0" max="1" value="1" step="0.01" type="range" class="form-control-range" id="example7SwapThresholdInput">
</div>
</div>
<div class="form-group row">
<div class="col-sm-10">
<div class="form-check">
<input class="form-check-input" type="checkbox" id="example7InvertSwapInput">
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="example7DirectionInput">Direction</label>
<select class="col-sm-4 form-control" id="example7DirectionInput">
<option value="h" selected>Horizontal</option>
<option value="v">Vertical</option>
</select>
</div>
</form>
</div>
</div>
<div style="display:none;">
<div style="padding: 0" class="col-12">
<pre class="prettyprint">new Sortable(example7, {
swapThreshold: <span id="example7SwapThresholdCode">1</span>,<span id="example7InvertSwapCode" style="display: none">
invertSwap: true,</span>
animation: 150
});</pre>
</div>
</div>
<div style="display:none;">
<div id="handle" class="row"><div id="example5" class="list-group col"></div><div style="padding: 0" class="col-12">
<pre class="prettyprint">new Sortable(example5, {
handle: '.handle', // handle's class
animation: 150
});</pre></div>
</div></div>
<div class="row"></div>
<div id="simple-list" class="row"><div id="example1" class="list-group col"></div><div style="padding: 0" class="col-12"></div></div>
<div id="shared-lists" class="row">	<div id="example2-left" class="list-group col"></div><div id="example2-right" class="list-group col"></div><div style="padding: 0" class="col-12"></div></div>
<div id="cloning" class="row"><div id="example3-left" class="list-group col"></div><div id="example3-right" class="list-group col"></div><div style="padding: 0" class="col-12"></div></div>
<div id="sorting-disabled" class="row"><div id="example4-left" class="list-group col"></div>
<div id="example4-right" class="list-group col"></div>
<div style="padding: 0" class="col-12"></div>
</div>


