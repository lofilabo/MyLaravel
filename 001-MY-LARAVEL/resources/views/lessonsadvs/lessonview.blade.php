</div>


<script>

var deadwav = new Audio("/snd/dead.wav");
var bumpwav = new Audio("/snd/bump.mp3");
var coinwav = new Audio("/snd/coin.mp3");
var jumpwav = new Audio("/snd/jump.wav");
var smashwav = new Audio("/snd/smash.mp3");
var pingwav = new Audio("/snd/ping.mp3");

var dragitemoneline = `<div class="list-group-item"><a class="edit-item-trigger-clicked" id='uniqueid-item--RANDOMTOKEN'>EDIT</a>  <a class="remove-item-trigger-clicked" id='uniqueid-itemm--RANDOMTOKEN'>| REMOVE</a></div>`;
//var dragitemoneline = `<div class="list-group-item"><a class="edit-item-trigger-clicked" id='uniqueid-item--RANDOMTOKEN'>EDIT</a></div>`;

      $('.clickxxxxx').click( function(e){
        var rndunq = getRndInteger(10000,99999);
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
        var dateTime = date+'--'+time;
        var uniqueID = dateTime + '--' + rndunq;
        console.log('fizzzzzzzzzzzzzzzzzzzzzzz');
        thisline = dragitemoneline.replace(/RANDOMTOKEN/g, uniqueID);
        $('#example1').html($('#example1').html() + thisline);
      } );

      $('.clickzzzzz').click( function(e){
        restoreFromStorage();
      } );
      
      function restoreFromStorage(){  
        if(''==$("#exfield1").text()){
          return;
        }
        if(''==$("#exfield2").text()){
          return;
        }

        innercontentsLHS_HTML = $("#exfield1").text();
        innercontentsLHS_DATA = JSON.parse($("#exfield2").text());
        console.log(innercontentsLHS_DATA);
        var innercontentsLHS_DATA_copy = new Array();
        //innercontentsLHS_DATA = $("#exfield2").text();
        //console.log( innercontentsLHS_DATA );
        $("#example1").html(innercontentsLHS_HTML);  

        $("#exfield1").text(innercontentsLHS_HTML);

          for(prop in innercontentsLHS_DATA){
            deadElement = 1;
            currObj = innercontentsLHS_DATA[prop];

            /*
            Messy but readable way of making sure that our object is set up like this:
            ["2021-4-10--9-48-10--25735--10000",{"text":"jhgjhgjhg"}],
            i.e, a key (unique ID for a DOM object) : {a text field with text in it.
            
            If it isn't, we can ignore it, it's useless anyway.
            */

            if ('null' != currObj & null != currObj ){
              if ('null' != currObj[0] & null != currObj[0]){
                if ('null' != currObj[1] & null != currObj[1]){
                  if ('null' != currObj[1].text & null != currObj[1].text){
                    //console.log( currObj[0]  + " : " + currObj[1].text );
                    textAreaID = "uniqueid-textarea--" + currObj[0];
                    //console.log(  textAreaID );
                    var element = document.getElementById(textAreaID);
                    //console.log(  element );
                    if('null' != element & null != element){
                        deadElement = 0;
                        //console.log(currObj);
                        innercontentsLHS_DATA_copy.push(currObj);
                        element.value=currObj[1].text ;
                    }

                  }
                }
              }
            }
            //innercontentsLHS_DATA_copy = currObj;
            /*
            if(deadElement == 1){
              console.log("try to remove this dead element:");
              console.log(currObj[0]);
              delete innercontentsLHS_DATA_copy[currObj[0]];
            }
            */
            
            
          }
          innercontentsLHS_DATA_copy_text = JSON.stringify(innercontentsLHS_DATA_copy);
          console.log(innercontentsLHS_DATA_copy_text);
          $("#exfield2").text(innercontentsLHS_DATA_copy_text);
          
      }

        $( '.clickyyyyy' ).click( function(e){
            storeHTMLLayout();
        } );


        function storeHTMLLayout(){
        //console.log("Heere");
        innercontentsLHS_HTML = $("#example1").html();
        console.log(innercontentsLHS_HTML);
        $("#exfield1").text(innercontentsLHS_HTML);          
        }

        $(document).on('input', '.textarea_onblock', function(e) {
              console.log(e.currentTarget.id);
              addToStorage(e.currentTarget.id);
        });

        $(document).on('click', ".edit-item-trigger-clicked", function() {
            concernedID =($(this).attr('id'));
            var options = {'backdrop': 'static'};
            $('#edit-modal').modal(options)
        })

        $(document).on('click', ".remove-item-trigger-clicked", function() {
            console.log('buzzzzzzzzzzzzzz');
            $(this).closest('div').remove();
        })



    function addToStorage(ecurrentTargetid){
        storeHTMLLayout();

        var editbox_id = "#" + ecurrentTargetid;
        var textstorage_id = editbox_id;
        var uniqueid = textstorage_id.replace('#uniqueid-textarea--' , '');

        console.log("TRIGGERED WITH:" + uniqueid + " - and - " + $( "#uniqueid-textarea--" + uniqueid ).val()  );
        
        boxdetails = new Object;
        
        console.log("Box Details");
        console.log(boxdetails);
        boxdetails.text = $( "#uniqueid-textarea--" + uniqueid ).val(); 
        /*add other boxdetails.object things here.....*/

        if( !sessionStorage.getItem("autosave") ){
            alreadysaved = new Map();
            sessionStorage.setItem("autosave", null );
        }

        alreadysaved = new Map(JSON.parse(sessionStorage.getItem("autosave") ));
        //console.log(alreadysaved);
        alreadysaved.set(uniqueid,  boxdetails);
        sessionStorage.setItem("autosave", JSON.stringify(Array.from(alreadysaved.entries())) );
        $("#exfield2").text(sessionStorage.getItem("autosave"));

        /*  SAVE HTML LAYOUT TO LOCAL STORAGE */
        //innercontentsLHS_HTML = $("#innercontentsLHS").html();
        //innercontentsRHS_HTML = $("#innercontentsRHS").html();
        
        //console.log(innercontentsLHS_HTML);
        //console.log(innercontentsLHS_HTML);
        
        //sessionStorage.setItem("innercontentsLHS_HTML", innercontentsLHS_HTML);
        //sessionStorage.setItem("innercontentsRHS_HTML", innercontentsRHS_HTML);       
    }

</script>

<!-- Latest Sortable -->
<script src="/Sortable.js"></script>

<script type="text/javascript" src="/st/prettify/prettify.js"></script>
<script type="text/javascript" src="/st/prettify/run_prettify.js"></script>

<script src="/st/app.js"></script>




<!-- Attachment Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="edit-modal-label">Select Lesson Type</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="attachment-body-content">
 <div style="width: 100%; overflow: hidden;">
     <div style="width: 500px; float: left;">         

              <div class="card text-dark bg-white mb-0">
                
                <div class="card-header">
                  <h3 class="m-0">Lesson Components</h3>
                  <h5>Click the polka dots to collapse all menu branches</h5>
                </div>

                          <div class="card-body">
                              <div class="form-group">

                                    <ul id="myUL">
                                      <li><span class="caret">The Universal Thinking Framework</span>
                                        <ul class="nested-open">


                                          <li><span class="caret nested-1">How do I get started?</span>
                                            <ul class="nested  nested-2">
                                                <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Extract.svg'>Extract</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Identify</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Categorise.svg'>Categorise </a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Eliminate.svg'>Eliminate</a></li>
                                            </ul>
                                          </li>

                                          <li><span class="caret nested-1">How should I organise my ideas?</span>
                                            <ul class="nested  nested-2">
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Connect</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Match.svg'>Match</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Rank.svg'>Rank</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Sequence.svg'>Sequence</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Arrange.svg'>Arrange</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Compare.svg'>Compare</a></li>
                                            </ul>
                                          </li>

                                          <li><span class="caret nested-1">How do I know this?</span>
                                            <ul class="nested  nested-2">
                                                <li><a class='clicky' data-nodetype='liveboxstyleYELLOW' data-imagename='Validate.svg'>Validate</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleYELLOW' data-imagename='Exemplify.svg'>Exemplify</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleYELLOW' data-imagename='Explain.svg'>Explain</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleYELLOW' data-imagename='Verify.svg'>Verify</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleYELLOW' data-imagename='Amplify.svg'>Amplify</a></li>
                                            </ul>
                                          </li>

                                          <li><span class="caret nested-1">How can I communicate my understanding?</span>
                                            <ul class="nested  nested-2">
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Verbs.svg'>Verbs</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Adverbs.svg'>Adverbs</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Adjectives.svg'>Adjectives</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Conjunctions.svg'>Conjunctions</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Prepositions.svg'>Prepositions</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleORANGE' data-imagename='Target Vocabulary.svg'>Target Vocabulary</a></li>
                                            </ul>
                                          </li>

                                          <li><span class="caret nested-1">What can I do with my new knowledge and skills?</span>
                                            <ul class="nested  nested-2">
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='New Perspective.svg'>New Perspective</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Complete.svg'>Complete</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Combine.svg'>Combine</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Elaborate</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Generalise.svg'>Generalise</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Integrate.svg'>Integrate</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Imagine.svg'>Imagine</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Hypothesise.svg'>Hypothesise</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Judge.svg'>Judge</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Designate.svg'>Designate</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Summarise.svg'>Summarise</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Generate Questions.svg'>Generate Questions</a></li>
                                                <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Infer.svg'>Infer</a></li>
                                            </ul>
                                          </li>


                                          <!--
                                          <li><span class="caret nested-1">Type 1 - 1</span>
                                            <ul class="nested  nested-2">
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 1</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 2</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 3</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 4</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 5</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleRED' data-imagename='Elaborate.svg'>Type 1 - 1 - 6</a></li>
                                            </ul>
                                          </li>
                                          <li><span class="caret nested-1">Type 1 - 2</span>
                                            <ul class="nested nested-2">
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 1</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 2</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 3</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 4</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 5</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleGREEN' data-imagename='Identify.svg'>Type 1 - 2 - 6</a></li>
                                            </ul>
                                          </li>
                                          <li><span class="caret nested-1">Type 1 - 3</span>
                                            <ul class="nested nested-2">
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 1</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 2</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 3</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 4</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 5</a></li>
                                              <li><a class='clicky' data-nodetype='liveboxstyleBLUE' data-imagename='Connect.svg'>Type 1 - 3 - 6</a></li>
                                            </ul>
                                          </li>
                                          -->

                                        </ul>
                                      </li>
                                    </ul>

                              </div>
                          </div>

          </div>
          </div>
               <div class='blatter foldupmenu'>  </div>
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <script>

            var concernedID ="";
            var modifier = 10000;


            var toggler = document.getElementsByClassName("caret");
            var i;
            for (i = 0; i < toggler.length; i++) {
              toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
              });
            }

          /* THIS CHUNK FOR DEBUG ONLY. */
          $( '.clicky' ).click( function(e){
            var el = $(".clicky"); 


            deadwav.play(); 

            nodeType   =  e.target.dataset.nodetype;
            console.log( e.target.dataset.nodetype );
            imageName   =  e.target.dataset.imagename;
            console.log(concernedID);

              var element = document.getElementById(concernedID);
              element.classList.remove('edit-item-trigger-clicked');
              element.classList.remove('remove-item-trigger-clicked');

            //$('#' + concernedID).classList.remove('edit-item-trigger-clicked');
            $('#' + concernedID).html(subInUniqueID(newHTMLblock,nodeType,imageName));

            id_of_Remove_item = concernedID.replace('uniqueid-item','uniqueid-itemm')
            $('#' + id_of_Remove_item).remove();
            
            storeHTMLLayout();
          } );


        $(document).on('click', ".edit-item-trigger-clicked", function() {
            concernedID =($(this).attr('id'));

            var options = {'backdrop': 'static'};
            $('#edit-modal').modal(options)
        })

        function subInUniqueID( htmlBlockIn, styleOfNewBlock, imageName ){

            var rndunq = getRndInteger(10000,99999);
            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
            var dateTime = date+'--'+time;
            var uniqueID = dateTime + '--' + rndunq + '--' + modifier;
            modifier++;

            htmlBlockOut = htmlBlockIn.replace( /#--uniqueIDtoken--#/g, uniqueID );
            htmlBlockOut = htmlBlockOut.replace( /#--styletoken--#/g, styleOfNewBlock );
            htmlBlockOut = htmlBlockOut.replace( /#--styletoken--#/g, styleOfNewBlock );
            htmlBlockOut = htmlBlockOut.replace( /#--imagename--#/g, imageName );
            htmlBlockOut = htmlBlockOut.replace( /textarea_onblock_all/g, "textarea_onblock_" + styleOfNewBlock );
            //textarea_onblock_liveboxstyleRED
            //console.log(htmlBlockOut);
            return htmlBlockOut;
        }


        $(".list-group-item .removecard").click(function(){
            console.log('cardclsoe');
        });

        $(".foldupmenu").click(function(){
          console.log("foldupmenu CLICK");
            var toggler = document.getElementsByClassName("caret");
            var nesty   = document.getElementsByClassName("nested-2");

            var i;
            for (i = 0; i < toggler.length; i++) {
                console.log(toggler[i]);
                toggler[i].classList.remove("caret-down");
            }

            var j;
            for (j = 0; j < nesty.length; j++) {
                console.log(nesty[j]);
                nesty[j].classList.remove("active");
            }

        });

    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min + 1) ) + min;
    }


    function handleCloseButtonOnACard(id){

      id_to_remove = "main-div-id-" + id;
      console.log(id_to_remove);
      
      var element = document.getElementById(id_to_remove);
      

      $("#"+id_to_remove).closest('.list-group-item').remove();

      //console.log(element.parentNode);
      
      //element.innerHTML=`<a class="edit-item-trigger-clicked" id='uniqueid-item--01'>EDIT</a>`;
      //element.parentNode.innerHTML=`<a class="edit-item-trigger-clicked" id='uniqueid-item--01'>EDIT</a>`;
      //element.parentNode.classList.add('edit-item-trigger-clicked');
    }

    var newHTMLblock = `

                                <div id="main-div-id-#--uniqueIDtoken--#" class="oneSingleLessonItem StackedListContent boxstyle #--styletoken--#"><input type='hidden' class='holder-for-unique-id' name='unique_id_holder' id="uniqueid-uniqueid--#--uniqueIDtoken--#" value="#--uniqueIDtoken--#"/>
                                <button onclick="handleCloseButtonOnACard('#--uniqueIDtoken--#')" id="uniqueid-closebutton--#--uniqueIDtoken--#" type="button" class="close" aria-label="Close"><span class="removecard" aria-hidden="true">&times;</span></button>
                                          <div class="ct-item" id="uniqueid-ct-item--#--uniqueIDtoken--#">
                                            <div class="lh-item" id="uniqueid-lhitem--#--uniqueIDtoken--#"><img class='assetimage_onblock' src='/assets/grfx/#--imagename--#' id="uniqueid-img--#--uniqueIDtoken--#"></div>
                                            <div class="rh-item" id="uniqueid-rhitem--#--uniqueIDtoken--#">
                                            <textarea class='textarea_onblock textarea_onblock_all' id="uniqueid-textarea--#--uniqueIDtoken--#"></textarea>
                                            
                                            </div>
                                            <br/>
                                          </div>
                                  <div class="Pattern Pattern--typeHalftone">
                                  </div>
                                  <div class="Pattern Pattern--typePlaced">
                                  </div>
                                </div>
                                
                         `;
          
        </script>
      </div>
    </div>
  </div>
</div>
<!-- /Attachment Modal -->





<style>
@media only screen and (max-width: 599px) {

        .boxstyle{
            margin:8px 0px 0px 0px !important;
            border-width: 1px 1px 1px 1px !important;
            border-style:solid !important;
            border-radius: 15px  !important;
            height: 150px;

        }

        .assetimage_onblock{
          width:80px;
          height:60px;
          margin-top: -16px;
        }
    
    .rh-item{
      margin-left: 15%;
      height: 60px;
      margin: 0px 0px 0px 0px ;
      padding: 0px 0px 0px 0px ;
      text-align: left !important;
      vertical-align: top !important;
    }    

        .textarea_onblock{
            border-style: solid;
            border-color: #bbbbbb;
            border-width: 1px 1px 1px 1px;  
            width:110%;
            height:72px;
            font-size:12px;
            line-height:14px;
            margin-top:-10px;
            margin-left: 20px;
            padding: 0px 0px 0px 4px ;
        }

        .textinput_onblock{
            border-style: solid;
            border-color: #dddddd;
            border-width: 1px 1px 1px 1px;  
            width:40%;
            font-size:24px;
            margin-top: 10px;
        }
}

@media only screen and (min-width: 600px) {
        .boxstyle{
            margin:12px 8px 0px 8px !important;
            border-width: 1px 1px 1px 1px !important;
            border-style:solid !important;
            border-radius: 8px  !important;
            height: 86px;

        }
        .assetimage_onblock{
          width:130px;
          margin-top: 28px;
      margin-left:-14px;
        }

    .rh-item{
      margin-left: 15%;
      height: 60px;
      width:  280px;
      margin: 0px 0px 0px 0px ;
      padding: 0px 0px 0px 0px ;
      text-align: left !important;
      vertical-align: top !important;
    }

        .textarea_onblock{
            border-style: solid;
            border-color: #bbbbbb;
            border-width: 1px 1px 1px 1px;  
            width:54%;
            height:72px;
            font-size:12px;
            line-height:14px;
            margin-top: 6px;
            margin-left: 0px;
            padding: 0px 0px 0px 4px ;
        }

        .textinput_onblock{
            border-style: solid;
            border-color: #dddddd;
            border-width: 1px 1px 1px 1px;  
            width:40%;
            font-size:24px;
            margin-top: 10px;
        }
}

.textarea_onblock_all{
  color:#000000;
}

.textarea_onblock_liveboxstyleGREEN{
  color:#000000;  
}

.textarea_onblock_liveboxstyleRED{
  color:#000000;  
}

.textarea_onblock_liveboxstyleYELLOW{
  color:#000000;  
}

.textarea_onblock_liveboxstyleBLUE{
  color:#000000;  
}

.textarea_onblock_liveboxstyleORANGE{
  color:#000000;  
}

.ulmainstyle{
  overflow-x:hidden !important;
  margin:0px 6px 0px 6px !important;
  border-width: 1px 1px 1px 1px !important;
  border-color:#ffffff #ffffff #ffffff #ffffff !important;
  border-style:solid !important;
  background-color:#dddddd !important;
  height:600px;
}

.ulbinstyle{
  overflow-x:hidden !important;
  margin:0px 6px 0px 6px !important;
  border-width: 1px 1px 1px 1px !important;
  border-color:#ffffff #ffffff #ffffff #ffffff !important;
  border-style:solid !important;
  background-color:#dddddd !important;
  height:135px;
}



.ghostboxstyle{
  border-color:#d0d0d0 #d0d0d0 #d0d0d0 #d0d0d0 !important;
  background-color:#dddddd !important;
  color:#d6d6d6 !important;
}

.ghostboxstylebin{
  border-color:#d0d0d0 #d0d0d0 #d0d0d0 #d0d0d0 !important;
  background-color:#dddddd !important;
  color:#d6d6d6 !important;
}

.liveboxstyleRED{
    border-color:#e74c3c #e74c3c #e74c3c #e74c3c !important;
    background-color:#f2d5d2 !important;
    color:#cf867e !important;
}

.liveboxstyleGREEN{
    border-color:#16a085 #16a085 #16a085 #16a085 !important;
    background-color:#d8ebe7 !important;
    color:#16a085 !important;
}

.liveboxstyleBLUE{
  border-color:#4a90e2 #4a90e2 #4a90e2 #4a90e2 !important;
  background-color:#ddeaf2 !important;
  color:#4a90e2 !important;
}


.liveboxstyleORANGE{
  border-color:#b44b10 #b44b10 #b44b10 #b44b10 !important;
  background-color:#f76b1c !important;
  color:#4a90e2 !important;
}


.liveboxstyleYELLOW{
  border-color:#b9960a #b9960a #b9960a #b9960a !important;
  background-color:#f1c206 !important;
  color:#4a90e2 !important;
}

.BlockContent{
    display: flex !important;
    align-items: left !important;
    justify-content: left !important;
    flex-direction: column !important;
    text-align: left !important;
    position: relative !important;
    height: 100%;
    color: #fff;    
}


.lh-menu{
    text-align: left !important;
    border-style: none;
    border-color: #dddddd;
    margin:10px 0px 0px 0px ;
}

.ct-item{
  width: 600px;
  height: 60;
  margin: auto;
  padding: 0px 0px 0px 0px ;
}

.lh-item{
  width: 130px;
  float: left;
  text-align: left !important;
  margin-top:-24px;
  margin-left:-8px;
}




.flexdisplay{
  display: flex;
  flex: 33.33%;
  padding: 5px;
}

.holdassets{
  flex: 33.33%;
  padding: 5px;
}

.tinyleftpad{
  padding:0px 0px 0px 6px ;
}

.verytinyleftpad{
    padding:0px 0px 0px 1px ;
}


.greyanchor{
    color:#d4d4d4;
}

#simplelist-LHS{
  padding: 0px 0px 0px 0px ;
}

#simplelist-MID{
  padding: 0px 0px 0px 1px ;
}

#simplelist-RHS{
    padding: 0px 0px 0px 1px ;
}


/* Remove default bullets */
ul, #myUL {
  list-style-type: none;
}

/* Remove margins and padding from the parent ul */
#myUL {
  margin: 0;
  padding: 0;
  font-size:18px;
}

/* Style the caret/arrow */
.caret {
  
  cursor: pointer;
  user-select: none; /* Prevent text selection */
}

/* Create the caret/arrow with a unicode, and style it */
.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

/* Rotate the caret/arrow icon when clicked on (using JavaScript) */
.caret-down::before {
  transform: rotate(90deg);
}

/* Hide the nested list */
.nested {
  display: none;
}

.nested-open{
  display:block;
}

/* Show the nested list when the user clicks on the caret/arrow (with JavaScript) */
.active {
  display: block;
}

.nested-1{
  padding:0px 0px 0px 20px;
}
.nested-2{
  padding:0px 0px 0px 40px;
}

.sp-container{
    /* width: 1283px; */
    max-width: 2000px !important;
    width: 107% !important;
    margin-left: -30px !important;
}

.blatter{
    background-image: radial-gradient(#212121 20%, transparent 20%),
    radial-gradient(#fafafa 20%, transparent 20%);
    background-position: 0 0, 50px 50px;
    background-size: 100px 100px;

    margin-left: 510px; 
    height:100%;  
    padding-bottom: 100%; 
    margin-bottom: -100%; 
    background-color:#dddddd  
}

</style>