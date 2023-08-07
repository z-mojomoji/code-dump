/**
 * AQPB js
 *
 * contains the core js functionalities to be used
 * inside AQPB
 * Modified - built on Aquapage builder.
 */
jQuery.noConflict();
/** Fire up jQuery - let's dance! **/
jQuery(document).ready(function($){

	// One off Toggle and Page Builder Choice
	$('#blocks-archive').show();

	$('.mtheme-edit-pb-wrap').show()
	
	var pb_isactive = $('#mtheme_pb_isactive').val();

	function set_pb_status(pb_isactive) {

		//console.log(pb_isactive);
		if (!pb_isactive) {
			//$('#postdivrich').css({'height':'auto','overflow':'visible','opacity':'1'});
			$('#postdivrich').show();
			$(window).trigger('resize');
			$('#aq-page-builder').hide();
			$('.mtheme-edit-visual,.mtheme-edit-pb').hide();
			$('.mtheme-edit-null').slideDown();
		}
		// is set to either
		if (pb_isactive=='1' || pb_isactive=='2') {
			$('.mtheme-edit-null').slideUp();
		}
		// if is requires changing
		if (pb_isactive=='3') {
			$('.mtheme-edit-null').slideToggle();
		}
		// if builder is active
		if (pb_isactive=='1') {
			//$('#postdivrich').css({'height':'1px','overflow':'hidden','opacity':'0'});
			$('#postdivrich').hide();
			$('#aq-page-builder').show();
			$('.mtheme-edit-visual').hide();
			$('.mtheme-edit-pb').show();
		}
		// if visual editor is set
		if (pb_isactive=='2') {
			//$('#postdivrich').css({'height':'auto','overflow':'visible','opacity':'1'});
			$('#postdivrich').show();
			$(window).trigger('resize');
			$('#aq-page-builder').hide();
			$('.mtheme-edit-visual').show();
			$('.mtheme-edit-pb').hide();
		}
	}
	set_pb_status(pb_isactive);

	$('.mtheme-pb-yes').on('click', function(){
		$('#mtheme_pb_isactive').val("1");
		set_pb_status('1');
	});
	$('.mtheme-pb-no').on('click', function(){
		$('#mtheme_pb_isactive').val("2");
		set_pb_status('2');
	});
	$('.mtheme-pb-change').on('click', function(){
		set_pb_status('3');
	});

	// Everything must start

	checkStack();
	update_block_order();
	update_block_number();

	var animation_class = "animated";
	var animation_add = "fadeIn";
	var animation_delete = "";

	$('#blocks-archive').find('ul').find('[data-toggle="tooltip"]').tooltip();

	var data_body = $('#aqpb-body');
	//enable all disable inputs in builder inputs
	data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);

	function checkStack() {
		idStack = new Array;
		$('#blocks-to-edit .block').each(function(index,element) {
			idStack[index] = $(element).attr('id');
		});
		do {
			// There is a duplicate let's check it out
			var id = has_duplicates(idStack);
			//console.log(has_duplicates(idStack));
			// id has the duplacates array
			for(i = 0; i< has_duplicates(idStack).length; i++) {
				// loop on the duplicates
				duplicate = id[i];
				// loop on each element with this id
				$("#"+duplicate).each(function(index,element) {
					// prepare the random key
					var randomKey = generateRandomKey();
					// change the whole id of the block
					$(element).attr('id',randomKey);
					// take the number only
					randomKey = randomKey.substr(9);
					duplicate = duplicate.substr(15);
					// Regex to replace all the duplicates with the new random value
			    	var s = $(element)[0].outerHTML;
                    var tagRegex = new RegExp('<\\w+((?:\\s[\\w-]+=(\'|")(?:[^\\2]*?)(?:\\2))+)[\\s\\/]*>', 'gim');
                    var attsRegex = new RegExp('(?:\\s[\\w-]+=(\'|")([^\\1]*?)(?:\\1))', 'gim');
                    var replaceSlugs = [ 'template-block-', 'my-content-', 'block-settings-', 'aq_block_' ];
                    var replacmentRegex = new RegExp( '((' + replaceSlugs.join( '|' ) + ')' + duplicate + ')', 'gim' );
					var ns = s.replace(tagRegex, function(match){
                        return match.replace( attsRegex, function( match ) {
                            return match.replace( replacmentRegex, function( match, p1, p2 ) {
                                //p2 is the slug without the id;
                                return p2 + randomKey;
                            } );
                        } );
                       });
                    $(element)[0].outerHTML = ns;
				});
				// empty the array and fill it again
				idStack = new Array;
				$('#blocks-to-edit .block').each(function(index,element) {
					idStack[index] = $(element).attr('id');
				});
			}
		} while( has_duplicates(idStack).length !== 0); // Loop till all the duplicates are solved
		return true;
	}
	function has_duplicates(idStack){
		var hash = [];
		for (var n=idStack.length; n--; ){
		   if (typeof hash[idStack[n]] === 'undefined') hash[idStack[n]] = [];
		   hash[idStack[n]].push(n);
		}

		var duplicates = [];
		for (var key in hash){
		    if (hash.hasOwnProperty(key) && hash[key].length > 1){
		        duplicates.push(key);
		    }
		}
		return duplicates;
	}
	$(document).em_undo().on('undo.mtheme redo.mtheme', function(){
		$('ul.blocks li.block.ui-resizable').removeClass('ui-resizable');
		$('ul.blocks li.block .ui-resizable-handle').remove();
		resizable_blocks();
		columns_sortable();
	});
	tooltip_builder();
	$('#saveTemplatePopover').parent().popover( {
		html : true
	});
	$('#saveTemplatePopover').parent().on('shown.bs.popover', function () {
		saveTemplate();
	});
	$('#page-builder').on('click','.resizePlus',function(e) {
		resizePlus($(this),e);
	});
	$('#page-builder').on('click','.resizeMinus',function(e) {
		resizeMinus($(this),e);
	});
	$('.mtheme-pb-remove-icon').live('click',function () {
		$(this).parent('.mtheme-pb-icon-selector').find('input.mtheme-pb-selected-icon:hidden').val('');
		$(this).parent('.mtheme-pb-icon-selector').find('.fontawesome_icon.preview').removeClass().addClass('fontawesome_icon preview');
	});
    $('#mtheme-pb-icon-selector-modal')
            .on( 'show.bs.modal', function(e) {
                var _relatedTarget = $(e.relatedTarget), that = $( this );
                if ( _relatedTarget ) {
                        var container = _relatedTarget.closest( '.mtheme-pb-icon-selector' );
                        var oldIcon = container.find( '.mtheme-pb-selected-icon' ).val();
                    that.find( '.icons-box' )
                            .find( '.selectedIcon' ).removeClass( 'selectedIcon' ).end()
                            .find( '.' + ( oldIcon || 'fontawesome_icon:first' ) ).addClass( 'selectedIcon' );
                    that.find('.icon-preview')
                            .find( '.fontawesome_icon' ).removeClass().addClass( 'fontawesome_icon ' + that.find( '.icons-box .selectedIcon' ).data( 'icon' ) )
                            .end().find( '.icon-name' ).text( that.find( '.icons-box .selectedIcon' ).data( 'icon' ) );
                    that.one( 'click.iconselector', '.mtheme-pb-icon-selector-done', function() {
                        var selectedIcon = that.find( '.selectedIcon' ).data( 'icon' );
                        container.find( '.mtheme-pb-selected-icon' )
                                .val( selectedIcon )
                                .end()
                                .find( '.fontawesome_icon.preview' )
                                .removeClass( oldIcon ).addClass( selectedIcon );
                        that.modal( 'hide' );
                    } )
                    .one( 'hide', function() {
                        that.off( '.iconselector' );
                    } );
                }
                that.on( 'click', '.fontawesome_icon', function() {
                    if ( $( this ).hasClass( 'selectedIcon' ) ) {
                        return;
                    }
                    that.find('.icons-box').find( '.selectedIcon' ).removeClass( 'selectedIcon' );
                    $( this ).addClass( 'selectedIcon' );
                    that.find( '.icon-preview' ).find( '.fontawesome_icon' ).removeClass().addClass( 'fontawesome_icon ' + $( this ).data( 'icon' ) );
                    that.find( '.icon-preview' ).find( '.icon-name' ).text( $( this ).data( 'icon' ) );
                } );
            } );
    $( document ).on( 'click', '[data-toggle="stackablemodal"]', function() {
        $( $( this ).attr( 'href' ) )
                .stackableModal()
                 .one( 'show.bs.modal', function() {
                    var $this = $( this );
                    $this.parents('.em_popup').removeClass('em_popup').addClass('addLater');
		                $this.mthemeFieldDependency();
	                    $this.off( 'change.mthemefd' );
	                    $this.on('click', '.sortable-head', function(){
	                    	var closest = $(this).closest('.sortable-item, .modal-body');
                    		if ( closest.length > 0 && closest.is('.sortable-item') ) {
                    			closest.mthemeFieldDependency();
                    		}
	                    });
	                    $this.on( 'change.mthemefd', '[data-fd-handle]', function() {
	                    	var closest = $(this).closest('.sortable-item, .modal-body');
                    		if ( closest.length > 0 && closest.is('.sortable-item') ) {
                    			closest.mthemeFieldDependency('run');
                    		} else {
                    			$this.mthemeFieldDependency( 'run' );
                    		}
	                    } );
		              })
                .one( 'shown.bs.modal', function() {
                    var $this = $( this );

                    var the_id_got = 'aq_block_' + $this.attr( 'id' ).substring( 15 );
                    var id_value = $this.attr( 'id' ).substring( 15 );

					console.log(id_value);
      //               $( '#block-settings-' + id_value + ' .main-richtext-block').each(function(index,element) {
      //               	console.log(element);
      //               	richtext_main_id = $(this).attr( 'id' );
      //               	tinyMCE.init({
      //               		mode : "none",
      //               		plugins: "textcolor,colorpicker",
						//     toolbar: [
						//         "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink",
						//         "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help"
						//     ]
      //               	});
						// tinyMCE.execCommand('mceAddEditor', false, richtext_main_id );
      //               });

					$( '#block-settings-' + id_value + ' .wp-editor-area').each(function(index,element) {
						richtext_main_id = $(this).attr( 'id' );
						console.log(richtext_main_id);
	                    //tinymce.init({ selector: richtext_main_id,menubar: false });
          //           	tinyMCE.init({
          //           		selector: richtext_main_id,
          //           		content_css : global_mtheme.template_dir+"assets/css/wp-editor.css",
          //           		plugins: "textcolor,colorpicker,wordpress,wplink",
          //           		wpautop: false,
						    // toolbar: [
						    //     "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink",
						    //     "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help"
						    // ]
          //           	});
	         //            tinyMCE.execCommand('mceAddEditor', true, richtext_main_id);
	         			$('#' + richtext_main_id).wp_editor();
                    });

                    $(document).off('focusin.modal');

					// Apply TinyMCE to child
					jQuery('#block-settings-' + id_value + ' .child-richtext-block').each(function(index,element) {
						//console.log(index,element);
						richtext_child_id = $(this).attr( 'id' );
						console.log ( richtext_child_id );
                    	tinyMCE.init({
                    		mode : "none",
                    		plugins: "textcolor",
						    toolbar: [
						        "newdocument bold italic underline strikethrough alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote undo redo",
						        "removeformat subscript superscript styleselect formatselect cut copy paste forecolor backcolor"
						    ]
                    	});
						tinyMCE.execCommand('mceAddEditor', false, richtext_child_id );
					});

                } )
                .one( 'hide.bs.modal', function() {
                    var $this = $( this );
                    $this.parents('.addLater').removeClass('addLater').addClass('em_popup');

                    var the_id_got = 'aq_block_' + $this.attr( 'id' ).substring( 15 );
                    var id_value = $this.attr( 'id' ).substring( 15 );

                    //aq_blocks[aq_block_{id}][blockID]
                    var user_div_id = $('#block-settings-' + id_value).find('.blockID').val();
                    $('#template-block-' + id_value).find('.user-control-id').text(user_div_id);

                    var user_note_self = $('#block-settings-' + id_value).find('.blockNote').val();
                    $('#template-block-' + id_value).find('.blocknote-self').text(user_note_self);

                    //console.log( '#' + the_id_got + '_mtheme_content_richtext' );
                    $( '#block-settings-' + id_value + ' .wp-editor-area').each(function(index,element) {
                    	richtext_main_id = $(this).attr( 'id' );
                    	console.log(richtext_main_id);
						//tinyMCE.get( richtext_main_id ).save();
						//tinyMCE.get( richtext_main_id + '_textarea').save();
						$('#' + richtext_main_id).text(tinyMCE.get(richtext_main_id).getContent());
						console.log(tinyMCE.get(richtext_main_id).getContent());
						tinyMCE.execCommand( 'mceRemoveEditor', true, richtext_main_id );
						
						console.log( $('#' + richtext_main_id).val() );
                    });

					current_sortable_id = $this.attr( 'id' ).substring( 15 );
					//console.log(current_sortable_id);
					$( '#aq-sortable-list-aq_block_'+ current_sortable_id + ' li .child-richtext-block').each(function(index,element) {
						//console.log(index,element);
						richtext_child_id = $(this).attr( 'id' );
						tinyMCE.get( richtext_child_id ).save();
						tinyMCE.execCommand( 'mceRemoveEditor', true, richtext_child_id );
					});

                } )
                .one( 'hidden.bs.modal', function() {
                    var $this = $( this );

                    var id_value = $this.attr( 'id' ).substring( 18 );
                    var user_div_id = $('#my-column-content-' + id_value).find('.blockID').val();
                    $('#template-block-' + id_value + ' > .block-bar .block-handle').find('.user-control-id').text(user_div_id);

                    var user_note_self = $('#my-column-content-' + id_value).find('.blockNote').val();
                    $('#template-block-' + id_value + ' > .block-bar .block-handle').find('.blocknote-self').text(user_note_self);
                } )
                .modal( 'show', this );

    } );
	$('.importToggle').click(function(e) {
		// e.preventDefault();
		// $('.importWrapper').slideToggle('fast');
	});
	$('.icons .radioButtonIcon i.fontawesome_icon').click(function(){
		$(this).parent().children('input').attr('checked','checked');
		$(this).parents('.icons').find('i.fontawesome_icon').removeClass('click checked');
		$(this).addClass('click');
	});
	$('.icons .radioButtonIcon input[checked="checked"]').each(function(){
		$(this).parent().children('i').addClass('checked');
	});

	$('.list .radioButtonIcon i.fontawesome_icon').click(function() {
		$(this).parent().children('input').attr('checked','checked');
		$(this).parents('.list').find('i.fontawesome_icon').removeClass('click').removeClass("checked");
		$(this).addClass('click');
	});
	$('.list .radioButtonIcon input[checked="checked"]').each(function(){
		$(this).parent().children('i').addClass('checked');
	});


	/** Variables
	------------------------------------------------------------------------------------**/
	var steps = new Array(191,259,397,554,608,791);
	var current_step = steps[0];

	//var column_steps = new Array(85,152,219,286,353,420,487,554,621,688,755);
	// var regular_steps = new Array(124,191,259,326,397,463,524,608,662,727,791);
	var regular_steps = new Array(16.66667,25,33.3333,41.66667,50,58.33333,66.66667,75,83.3333,91.66667,100);
	// var regular_steps = new Array(124,191,259,326,397,463,524,608,662,87.08333%,95%);
	// var regular_steps = new Array(138,205,272,334,401,465,553,595,657,724,791);
	var current_regular_step = regular_steps[0];

	// var column_steps = new Array(118,183,249,312,378,444,503,570,634,700,766);
    var column_steps = new Array(
    			[],
    			[],
				[98,98,98,98,98,98,98,98,98,98,98],
				[65.33333333333333,98,98,98,98,98,98,98,98,98,98],
				[49,73.5,98,98,98,98,98,98,98,98,98],
				[39.2,58.8,78.4,98,98,98,98,98,98,98,98],
				[32.666666666666664,49,65.33333333333333,81.66666666666667,98,98,98,98,98,98,98],
				[28,42,56,70,84,98,98,98,98,98,98],
				[24.5,36.75,49,61.25,73.5,85.75,98,98,98,98,98],
				[21.777777777777775,32.666666666666664,43.55555555555555,54.44444444444445,65.33333333333333,76.22222222222223,87.1111111111111,98,98,98,98],
				[19.6,29.4,39.2,49,58.8,68.6,78.4,88.2,98,98,98],
				[17.81818181818182,26.727272727272727,35.63636363636364,44.54545454545455,53.45454545454545,62.36363636363636,71.27272727272728,80.18181818181819,89.0909090909091,98,98],
				[16.333333333333332,24.5,32.666666666666664,40.833333333333336,49,57.16666666666667,65.33333333333333,73.5,81.66666666666667,89.83333333333333,98]
			);
	var current_column_step = column_steps[12][0];

	var column_home_steps = new Array(183,249,378,503,570,766);
	var current_column_home_step = column_home_steps[0];


	var block_archive,
		block_number,
		parent_id,
		block_id,
		intervalId,
		resizable_args = {
			handles: 'e',
			minWidth: 85,
			start: function(event, ui) {
				mtheme.undo.prototype.setStorage();
				if($(ui.helper).hasClass('mtheme-columns')) {
					$(ui.helper).find('li.block').each(function(index,element) {
						$(element).width($(element).width());
					});
				}
			},
			resize: function(event, ui) {
			    ui.helper.css("height", "inherit");
			    var ui_size = ui.size.width/$('#blocks-to-edit').width()*100;
			    if(ui_size <= regular_steps[0]) {
		            $(this).css('width',regular_steps[0]+'%');
		            current_regular_step = regular_steps[0];
		        } else if(ui_size >= regular_steps[0] && ui_size <= regular_steps[1]) {
		            $(this).css('width',regular_steps[1]+'%');
		            current_regular_step = regular_steps[1];
		        } else if(ui_size >= regular_steps[1] && ui_size <= regular_steps[2]) {
		            $(this).css('width',regular_steps[2]+'%');
		            current_regular_step = regular_steps[2];
		        } else if(ui_size >= regular_steps[2] && ui_size <= regular_steps[3]) {
		            $(this).css('width',regular_steps[3]+'%');
		            current_regular_step = regular_steps[3];
		        } else if(ui_size >= regular_steps[3] && ui_size <= regular_steps[4]) {
		            $(this).css('width',regular_steps[4]+'%');
		            current_regular_step = regular_steps[4];
		        } else if(ui_size >= regular_steps[4] && ui_size <= regular_steps[5]) {
		            $(this).css('width',regular_steps[5]+'%');
		            current_regular_step = regular_steps[5];
		        } else if(ui_size >= regular_steps[5] && ui_size <= regular_steps[6]) {
		            $(this).css('width',regular_steps[6]+'%');
		            current_regular_step = regular_steps[6];
		        } else if(ui_size >= regular_steps[6] && ui_size <= regular_steps[7]) {
		            $(this).css('width',regular_steps[7]+'%');
		            current_regular_step = regular_steps[7];
		        } else if(ui_size >= regular_steps[7] && ui_size <= regular_steps[8]) {
		            $(this).css('width',regular_steps[8]+'%');
		            current_regular_step = regular_steps[8];
		        } else if(ui_size >= regular_steps[8] && ui_size <= regular_steps[9]) {
		            $(this).css('width',regular_steps[9]+'%');
		            current_regular_step = regular_steps[9];
		        } else if(ui_size >= regular_steps[9] && ui_size <= regular_steps[10]) {
		            $(this).css('width',regular_steps[10]+'%');
		            current_regular_step = regular_steps[10];
		        } else {
		            $(this).css('width',regular_steps[10]+'%');
		            current_regular_step = regular_steps[10];
		        }
			},
			stop: function(event, ui) {
				console.log('Reached 1');
				ui.helper.css('left', ui.originalPosition.left);
				$(ui.helper).toggleClass( function (index, css) {
				    return (css.match (/\bspan\S+/g) || []).join(' ') + ' ' + block_size( $(ui.helper).width());
				});
				if($(ui.helper).hasClass('mtheme-columns')) {
					 $(ui.helper).find('.block-settings-column').find('.size').last().val(block_size( $(ui.helper).width() ));
					// $('.size[name*='+$(ui.helper).attr('id').substring('15')+']').val(block_size( $(ui.helper).width() ));
					// if there is some blocks inside the column and you are resizing it
					if($(ui.helper).find('li.block').length) {
						console.log('Found blocks');
						$(ui.helper).find('li.block').each(function (count,element) {
							$(element).css('width','');
							
							//console.log( parseInt(' UNO ' + parseInt($(ui.helper).find('.size').last().val().substring(4)) , parseInt($(element).find('.size').val().substring(4)) );

							var column_span_value = parseInt($(ui.helper).find('.size').last().val().substring(4));
							var column_span_text_value = $(ui.helper).find('.size').last().val().substring(4);
							var element_span_value = parseInt($(element).find('.size').val().substring(4));

							var column_span_class = 'span'+column_span_value;

							console.log( 'DUOS ' + column_span_value , element_span_value );

							if(column_span_value <= element_span_value) {
								//var parent_span = $(ui.helper).children('.block-settings-column').find('.size').first().val();
								var parent_span = $('.size[name*='+$(ui.helper).attr('id').substring('15')+']').val();
								//console.log( 'parent span :' + parent_span );
								//console.log( 'parent span text sent as:' + column_span_text_value );
								//console.log( 'parent id :' + $(ui.helper).attr('id') );
								//console.log( 'sent as parent span :' + parseInt($(ui.helper).find('.size').last().val().substring(4)) );
								$(element).toggleClass (function (index, css) {
									//console.log('chanaging ' + index + ' *** ' + css + ' matching:'+parent_span);
								    return (css.match (/\bspan\S+/g) || []).join(' ') + ' ' + column_span_class ;
								});
								$(element).find('.block-settings').find('.size').val(column_span_class);
							}
						});

					}
				} else {
					$(ui.helper).find('.block-settings').find('.size').val(block_size( $(ui.helper).width() ));
					var parent_span = $(ui.helper).find('.size').val();
				}
				$(ui.helper).css('width','');
				handleSize($(ui.helper).children('div'));
			}
		},
		resizable_args_column = {
			handles: 'e',
			minWidth: 95,
			start: function() {
				mtheme.undo.prototype.setStorage();
			},
			resize: function(event, ui) {
			    ui.helper.css("height", "inherit");
				var column_size = ui.element.parents('.mtheme-columns').find('.block-settings-column').find('.size').last().val();
				switch (column_size){
					case 'span12':
						update_column_step($(this),12,ui);
					break;
					case 'span11':
						update_column_step($(this),11,ui);
					break;
					case 'span10':
						update_column_step($(this),10,ui);
					break;
					case 'span9':
						update_column_step($(this),9,ui);
					break;
					case 'span8':
						update_column_step($(this),8,ui);
					break;
					case 'span7':
						update_column_step($(this),7,ui);
					break;
					case 'span6':
						update_column_step($(this),6,ui);
					break;
					case 'span5':
						update_column_step($(this),5,ui);
					break;
					case 'span4':
						update_column_step($(this),4,ui);
					break;
					case 'span3':
						update_column_step($(this),3,ui);
					break;
					case 'span2':
						update_column_step($(this),2,ui);
					break;
					default:
						update_column_step($(this),2,ui);
					break;
				}


			},
			stop: function(event, ui) {
				console.log('Reached 3');
				ui.helper.css('left', ui.originalPosition.left);
				ui.helper.removeClass (function (index, css) {
				    return (css.match (/\bspan\S+/g) || []).join(' ');
				}).addClass(block_size_incolumn( $(ui.helper).width(), $(ui.helper).parents('.mtheme-columns')));
				if($(ui.helper).hasClass('mtheme-columns')) {
					ui.helper.find('.block-settings-column').find('.size').first().val(block_size_incolumn( $(ui.helper).width(), $(ui.helper).parents('.mtheme-columns') ));
				} else {
					ui.helper.find('.block-settings').find('.size').val(block_size_incolumn( $(ui.helper).width(), $(ui.helper).parents('.mtheme-columns') ));
				}
				$(ui.helper).css('width','');
				handleSize($(ui.helper).children('div'));
			}
		},
		tabs_width = $('.aqpb-tabs').outerWidth(),
		mouseStilldown = false,
		max_marginLeft = 720 - Math.abs(tabs_width),
		activeTab_pos = $('.aqpb-tab-active').next().position(),
		act_mleft,
		$parent,
		$clicked;

	/** Functions
	------------------------------------------------------------------------------------**/
	function update_column_step(elementy,span,ui) {
		console.log('Reached 5');
		var column_width = ui.element.parents('.mtheme-columns').width();
		var ui_width = ui.size.width/column_width*100;
		if(ui_width <= column_steps[span][0]) {
			elementy.css('width',column_steps[span][0]+'%');
			current_column_step = column_steps[span][0];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][0] && ui_width <= column_steps[span][1]) {
			elementy.css('width',column_steps[span][1]+'%');
			current_column_step = column_steps[span][1];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][1] && ui_width <= column_steps[span][2]) {
			elementy.css('width',column_steps[span][2]+'%');
			current_column_step = column_steps[span][2];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][2] && ui_width <= column_steps[span][3]) {
			elementy.css('width',column_steps[span][3]+'%');
			current_column_step = column_steps[span][3];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][3] && ui_width <= column_steps[span][4]) {
			elementy.css('width',column_steps[span][4]+'%');
			current_column_step = column_steps[span][4];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][4] && ui_width <= column_steps[span][5]) {
			elementy.css('width',column_steps[span][5]+'%');
			current_column_step = column_steps[span][5];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][5] && ui_width <= column_steps[span][6]) {
			elementy.css('width',column_steps[span][6]+'%');
			current_column_step = column_steps[span][6];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][6] && ui_width <= column_steps[span][7]) {
			elementy.css('width',column_steps[span][7]+'%');
			current_column_step = column_steps[span][7];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][7] && ui_width <= column_steps[span][8]) {
			elementy.css('width',column_steps[span][8]+'%');
			current_column_step = column_steps[span][8];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][8] && ui_width <= column_steps[span][9]) {
			elementy.css('width',column_steps[span][9]+'%');
			current_column_step = column_steps[span][9];
			handleSize($(ui.helper).children('div'));
		} else if(ui_width >= column_steps[span][9] && ui_width <= column_steps[span][10]) {
			elementy.css('width',column_steps[span][10]+'%');
			current_column_step = column_steps[span][10];
			handleSize($(ui.helper).children('div'));
		} else {
			elementy.css('width',column_steps[span][10]+'%');
			current_column_step = column_steps[span][10];
			handleSize($(ui.helper).children('div'));
		}
	}
	/** create unique id **/
	function makeid()
	{
		do {
			id = _.uniqueId('dynamic_');
		} while ( $('#template-block-' + id).length !== 0 );

	   return id;
	}

	function generateRandomKey() {
		var text = "aq_block_";
	    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		   for( var i=0; i < 5; i++ )
			   text += possible.charAt(Math.floor(Math.random() * possible.length));

		return text;
	}
	/** Get correct class for block size **/
	function block_size(width) {
		var span = "span12";
		width = parseInt(width);
		var ui_size = width/$('#blocks-to-edit').width()*100;

			 if (ui_size <= regular_steps[0]) { span = "span2"; }
		else if (ui_size > regular_steps[0] && ui_size <= regular_steps[1]){ span = "span3"; }
		else if (ui_size > regular_steps[1] && ui_size <= regular_steps[2]){ span = "span4"; }
		else if (ui_size > regular_steps[2] && ui_size <= regular_steps[3]){ span = "span5"; }
		else if (ui_size > regular_steps[3] && ui_size <= regular_steps[4]){ span = "span6"; }
		else if (ui_size > regular_steps[4] && ui_size <= regular_steps[5]){ span = "span7"; }
		else if (ui_size > regular_steps[5] && ui_size <= regular_steps[6]){ span = "span8"; }
		else if (ui_size > regular_steps[6] && ui_size <= regular_steps[7]){ span = "span9"; }
		else if (ui_size > regular_steps[7] && ui_size <= regular_steps[8]){ span = "span10"; }
		else if (ui_size > regular_steps[8] && ui_size <= regular_steps[9]){ span = "span11"; }
		else if (ui_size > regular_steps[9] && ui_size <= regular_steps[10]){ span = "span12"; }
		return span;
	}
	function block_size_incolumn(width,parent) {
		var span = "span12";
		width = parseInt(width);
		var parent_width = parent.width();
		var ui_width = width/parent_width*100; // width in percentage
		var size = parent.find('.block-settings-column').find('.size').last().val().substring(4);

		if(ui_width <= column_steps[size][0])
			span = "span2";
		else if(ui_width >= column_steps[size][0] && ui_width <= column_steps[size][1])
			span = "span3";
		else if(ui_width >= column_steps[size][1] && ui_width <= column_steps[size][2])
			span = "span4";
		else if(ui_width >= column_steps[size][2] && ui_width <= column_steps[size][3])
			span = "span5";
		else if(ui_width >= column_steps[size][3] && ui_width <= column_steps[size][4])
			span = "span6";
		else if(ui_width >= column_steps[size][4] && ui_width <= column_steps[size][5])
			span = "span7";
		else if(ui_width >= column_steps[size][5] && ui_width <= column_steps[size][6])
			span = "span8";
		else if(ui_width >= column_steps[size][6] && ui_width <= column_steps[size][7])
			span = "span9";
		else if(ui_width >= column_steps[size][7] && ui_width <= column_steps[size][8])
			span = "span10";
		else if(ui_width >= column_steps[size][8] && ui_width <= column_steps[size][9])
			span = "span11";
		else if(ui_width >= column_steps[size][9] && ui_width <= column_steps[size][10])
			span = "span12";
		return span;

	}
	/** Blocks resizable dynamic width **/
	function resizable_dynamic_width(blockID) {
		var blockPar = $('#' + blockID).parent(),
			maxWidth = parseInt($(blockPar).parent().parent().css('width'));

		//set widths when the parent resized
		$('#' + blockID).bind( "resizestop", function(event, ui) {
			if($('#' + blockID).hasClass('block-em_column_block') ) {
				var $blockColumn = $('#' + blockID),
					new_maxWidth = parseInt($blockColumn.css('width'));
					child_maxWidth = new Array();
				var minWidth = Math.max.apply( Math, child_maxWidth );
				$('#' + blockID + '.ui-resizable').resizable( "option", "minWidth", minWidth );
			}

			$('#' + blockID + '.ui-resizable').css({"position":"","top":"auto","left":"0px"});

		});

	}

	/** Update block order **/
	function update_block_order() {
		$('ul.blocks').each( function() {
			$(this).children('li.block').each( function(index, el) {
				$(el).find('.order').last().val(index + 1);
				//console.log(el);
				if($(el).parent().hasClass('column-blocks')) {
					parent_order = $(el).parent().siblings('.order').val();
					$(el).find('.parent').last().val(parent_order);
				} else {
					$(el).find('.parent').last().val(0);
					if($(el).hasClass('block-em_column_block') ) {
						block_order = $(el).find('.order').last().val();
						$(el).find('li.block').each(function(index,elem) {
							$(elem).find('.parent').val(block_order);
						});
					}
				}

			});
		});
	}

	/** Update block number **/
	function update_block_number() {
		$('ul.blocks li.block').each( function(index, el) {
			$(el).find('.number').last().val(index + 1);
		});
	}

	function columns_sortable() {
		$('#page-builder .column-blocks').sortable({
			placeholder: 'placeholder',
			start: function(e, ui){
				var current_item_width = $(ui.item).width();
			    $(ui.placeholder).width(current_item_width).css('margin-right','10px');
			    $(ui.placeholder).hide(300);
			},
			change: function (e,ui){
				var current_item_width = $(ui.item).width();
			    $(ui.placeholder).width(current_item_width).css('margin-right','10px');;
			    $(ui.placeholder).hide().show(300);
			},
			connectWith: '#blocks-to-edit, .column-blocks',
			items: 'li.block',
            cancel: 'ul.block-controls, .modal'
		});
	}

	/** Menu functions **/
	function moveTabsLeft() {
		if(max_marginLeft < $('.aqpb-tabs').css('margin-left').replace("px", "") ) {
			$('.aqpb-tabs').animate({'marginLeft': ($('.aqpb-tabs').css('margin-left').replace("px", "") - 7) + 'px' },
			1,
			function() {
				if(mouseStilldown) {
					moveTabsLeft();
				}
			});
		}
	}

	function moveTabsRight() {
		if($('.aqpb-tabs').css('margin-left').replace("px", "") < 0) {
			$('.aqpb-tabs').animate({'marginLeft': Math.abs($('.aqpb-tabs').css('margin-left').replace("px", ""))*(-1) + 7 + 'px' },
			1,
			function() {
				if(mouseStilldown) {
					moveTabsRight();
				}
			});
		}
	}

	function centerActiveTab() {
		if($('.aqpb-tab-active').hasClass('aqpb-tab-add')) {
			act_mleft = 690 - $('.aqpb-tab-active').position().left - $('.aqpb-tab-active').width();
			$('.aqpb-tabs').css('margin-left' , act_mleft + 'px');
		} else
		if(720 < activeTab_pos.left) {
			act_mleft = 730 - activeTab_pos.left;
			$('.aqpb-tabs').css('margin-left' , act_mleft + 'px');
		}
	}

	/** Actions
	/** Apply CSS float:left to blocks **/
	$('li.block').css('float', 'none');


	/** Blocks resizable **/
	resizable_blocks();
	function resizable_blocks() {
		$('ul.blocks li.block').each(function() {
			// The tough loop
			// Set a delay through iteration to ease out the complex assigning of resizable modules giving power to browser to do other things.
			var blockID = $(this).attr('id'),
			blockPar = $(this).parent();

			setTimeout(function(){
				//console.log("#" + blockID);
				//blocks resizing
				if($("#" + blockID).parents('li').hasClass('mtheme-columns')) {

					$('#' + blockID).resizable(resizable_args_column);

				} else {
					$('#' + blockID).resizable(resizable_args);
				}

				//set dynamic width for blocks inside columns
				resizable_dynamic_width(blockID);

				//trigger resize
				$('#' + blockID).trigger("resize");
				$('#' + blockID).trigger("resizestop");

				//disable resizable on .not-resizable blocks
				$(".ui-resizable.not-resizable").resizable("destroy");
			}, 2000);

		});
	}

	function resizable_certain_block(element) {
			var blockID = $(element).attr('id'),
				blockPar = $(element).parent();

			//blocks resizing
			if( $("#" + blockID).parents('div').hasClass('modal-body') ) {
				//Dont resize items with not resizable class in modals
			} else {
				if($("#" + blockID).parents('li').hasClass('mtheme-columns')) {
					$('#' + blockID).resizable(resizable_args_column);
				} else {
					$('#' + blockID).resizable(resizable_args);
				}

				//set dynamic width for blocks inside columns
				resizable_dynamic_width(blockID);

				//trigger resize
				$('#' + blockID).trigger("resize");
				$('#' + blockID).trigger("resizestop");

				//disable resizable on .not-resizable blocks
				$(".ui-resizable.not-resizable").resizable("destroy");
			}
	}

	$('#blocks-archive').tabs();
	/** Blocks draggable (archive) **/
	$('#blocks-archive li.block').each(function() {
		$(this).draggable({
			connectToSortable: "#blocks-to-edit",
			helper: 'clone',
			revert: 'invalid',
			disabled: true,
			start: function(event, ui) {
				block_archive = $(this).attr('id');
			}
		});
	});

	/** Blocks sorting (settings) **/
	$('#blocks-to-edit').sortable({
		placeholder: "placeholder",
		start: function(e, ui){
			var current_item_width = $(ui.item).width();
		    $(ui.placeholder).width(current_item_width).css('margin-right','10px');
		    $(ui.placeholder).hide(300);
		},
		change: function (e,ui){
			var current_item_width = $(ui.item).width();
		    $(ui.placeholder).width(current_item_width).css('margin-right','10px');;
		    $(ui.placeholder).hide().show(300);
		},
		tolerance: "pointer",
		opacity: 0.8,
		handle: '.block-handle, .block-settings-column',
		connectWith: '#blocks-archive, .column-blocks',
		items: 'li.block',
                cancel: 'ul.block-controls, .modal'
	});

	/** Columns Sortable **/
	columns_sortable();

	/** Sortable bindings **/
	$( "ul.blocks" ).bind( "sortstart", function(event, ui) {
		ui.placeholder.css('width', ui.helper.css('width'));
		$('.empty-template').fadeOut( "fast", function() {
			// Animation complete.
			$('.empty-template').fadeOut().remove();
		});

	});

	$( "#blocks-archive .block" ).bind( "mousedown", beforeSortStart);
	$( "#blocks-to-edit .block" ).bind( "mousedown", beforeSortStart);

	function beforeSortStart() {
		mtheme.undo.prototype.setStorage();
	}

	$( "ul.blocks" ).bind( "sortstop", onSortStop);
	function onSortStop(event, ui) {
		$('.block-popup').hide();
		ui.item.css({'width':'','height':'','z-index':''});
		//if coming from archive
		if (ui.item.hasClass('ui-draggable')) {
			//remove draggable class
		    ui.item.removeClass('ui-draggable');

		    //set random block id
		    block_number = makeid();
		    //replace id
		    ui.item.html(ui.item.html().replace(/<[^<>]+>/g, function(obj) {
		        return obj.replace(/__i__|%i%/g, block_number);
		    }));

		    ui.item.attr("id", block_archive.replace("__i__", block_number));
		    //if column, remove handle bar
		    if(ui.item.hasClass('block-em_column_block') ) {
		    	ui.item.addClass('mtheme-columns');
		    	ui.item.find('.clone').first().parent('li').remove();
		    	ui.item.find('.block-settings').removeClass('block-settings').addClass('block-settings-column');
		    }

		    //open on drop
		    var blockID = ui.item.find('a.block-edit').parents('li').attr('id');

			//icon Radio Button
			$('.icons .radioButtonIcon i.fontawesome_icon').click(function(){
				$(this).parent().children('input').attr('checked','checked');
				$(this).parents('.icons').find('i.fontawesome_icon').removeClass('click checked');
				$(this).addClass('click');
			});
			$('.icons .radioButtonIcon input[checked="checked"]').each(function(){
				$(this).parent().children('i').addClass('checked');
			});

			$('.list .radioButtonIcon i.fontawesome_icon').click(function() {
				$(this).parent().children('input').attr('checked','checked');
				$(this).parents('.list').find('i.fontawesome_icon').removeClass('click').removeClass("checked");
				$(this).addClass('click');
			});
			$('.list .radioButtonIcon input[checked="checked"]').each(function(){
				$(this).parent().children('i').addClass('checked');
			});

				/* divder display 	 select option */
		}

		//if moving column inside column, cancel it
		if(ui.item.hasClass('block-em_column_block') ) {
			if(ui.item.parent().hasClass('column-blocks')) {
				$(this).sortable('cancel');
				return false;
			}
			columns_sortable();
		}

		if(ui.item.parents().hasClass('mtheme-columns')) {
			// was a larger width and resized

			if ( ui.item.find('.size').length ) {
				var column_span_value = parseInt(ui.item.parents('.mtheme-columns').find('.size').last().val().substring(4));
				var element_span_value = parseInt(ui.item.find('.size').val().substring(4));
				var column_span_class = 'span'+column_span_value;

				if( column_span_value <= element_span_value ) {
					var parent_span = jQuery('.size[name*='+ui.item.parents('.mtheme-columns').attr('id').substring('15')+']').val();

					//console.log( 'DROP parent span :' + parent_span );
					//console.log( 'DROP sent as parent span :' + parseInt(ui.item.parents('.mtheme-columns').find('.size').last().val().substring(4)) );

					ui.item.toggleClass (function (index, css) {
						//console.log('DROP changing ' + index + ' *** ' + css + ' matching:'+column_span_class);
					    return (css.match (/\bspan\S+/g) || []).join(' ')+' '+column_span_class;
					});
					ui.item.find('.block-settings').find('.size').val(column_span_class );
				} else {
					ui.item.toggleClass (function (index, css) {
					    return (css.match (/\bspan\S+/g) || []).join(' ')+' '+block_size_incolumn( ui.item.width(),ui.item.parents('.mtheme-columns') );
					});
					ui.item.find('.block-settings').find('.size').val(block_size_incolumn( ui.item.width(), ui.item.parents('.mtheme-columns') ));
				}
				ui.item.css('width', '');
			}
		}
		//update order & parent ids
		update_block_order();

		//update number
		update_block_number();


			var id_name = ui.item[0].id.substring(15);
			$("#aq_block_"+id_name).insertBefore($("#aq_block_"+id_name).parents('.wp-editor-wrap .wp-editor-container > span'));
			$("#aq_block_"+id_name).show().next('.wp-editor-wrap .wp-editor-container > span').remove();

			var checked_radio_tab = new Array;
		    ui.item.find('.iconselector').each(function(index,element) {
				$(this).find('input:radio:checked').each(function(index1,element1) {
					checked_radio_tab[index1,index] = $(element1).val();
				});
			});
			ui.item.find('.iconselector').each(function(index,element){
				$(this).find('input:radio').each(function(index1,element1){
					for (var i=0; i < checked_radio_tab.length; i++) {
						if($(element1).val() == checked_radio_tab[i,index]) {
							$(element1).attr('checked','checked');
						}
					}
				});
			});
			var checked_radio_tab = new Array;
			ui.item.find('.radioBtnWrapper').each(function(index,element) {
				$(this).find('input:radio:checked').each(function(index1,element1) {
					checked_radio_tab[index1,index] = $(element1).val();
				});
			});
			ui.item.find('.radioBtnWrapper').each(function(index,element){
				$(this).find('input:radio').each(function(index1,element1){
					for (var i=0; i < checked_radio_tab.length; i++) {
						if($(element1).val() == checked_radio_tab[i,index]) {
							$(element1).attr('checked','checked');
						}
					}
				});
			});

			ui.item.find('input[type="number"]').each(function(index,element) {
				$(this).attr('value',$(element).val());
			});

			//init resize on newly added block
		    resizable_certain_block(ui.item);
			aqpb_colorpicker();
			$('.justAppended').removeClass('justAppended');
			ui.item.addClass('justAppended').css('width','');
			$('.justAppended').addClass( animation_class + ' ' + animation_add );
			setTimeout(function() {
		    	//$('.justAppended').find('.mce-tinymce').remove();
		    	$(document.body).on( 'click', '.insert-media', function( event ) {
		    		if($(this).data('editor') !== 'content')
						wpActiveEditor = $(this).data('editor');
				});
		    },500);

			handleSize(ui.item.children('div'));

			tooltip_builder();
			$('select[id*="entrance_animation"]').change(function() {
				var class_added=$(this).val();
				$(this).parents('.select').find('.entrance_animation_sim').removeClass().addClass('entrance_animation_sim');
				$('.entrance_animation_sim').addClass(class_added);
			});
		}


	/** Template Select **/
	function templateChange() {
	$("#template-templates").change(function() {
		if($("#template-templates option:selected").hasClass('manuallySaved')) {
			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					postID : $("#post_ID").val(),
					getTemp : $(this).val(),
					action : 'content_builder_get_templates'
				},
				success: function(data) {
					$("#blocks-to-edit").html(data);
					resizable_blocks();
					columns_sortable();
					$( "ul.blocks" ).each(function(index, element) {
						//$(element).find('.block-em_column_block').addClass('mtheme-columns');
						// $(element).find('.block-aq_column_block').find('.block-edit').first().parent('li').remove();
						//$(element).find('.block-em_column_block').find('.block-settings').removeClass('block-settings').addClass('block-settings-column');
					});
				}
			});
		} else {
				$template = $(this).val();
				if($(this).val() == '') {
					return 0;
				}
				$.ajax({
					url: global_mtheme.ajax_url,
					type: "POST",
					data : {
						template : $template,
						action : 'content_builder_templates'
					},
					success: function(data) {
						mtheme.undo.prototype.setStorage();
						$("#blocks-to-edit").html(data);
						$('ul.blocks li.block.ui-resizable').removeClass('ui-resizable');
						$('ul.blocks li.block .ui-resizable-handle').remove();
						resizable_blocks();
					}
				});
			}
		});
		resizable_blocks();
	}
	templateChange();
	/** Blocks droppable (removing blocks) **/
	$('#page-builder-archive').droppable({
		accept: "#blocks-to-edit .block",
		tolerance: "pointer",
		over : function(event, ui) {
			$(this).find('#removing-block').fadeIn('slow');
			ui.draggable.parent().find('.placeholder').hide();
		},
		out : function(event, ui) {
			$(this).find('#removing-block').fadeOut('Slow');
			ui.draggable.parent().find('.placeholder').show();
		},
		drop: function(ev, ui) {
	        ui.draggable.remove();
	        $(this).find('#removing-block').fadeOut('slow');
		}
	});

	// Click and take action
	$(document).on('click', '.block-control-actions a', function() {
		$clicked = $(this);
		$parentChild = $(this).parents('li.sortable-item').first();
		$parent = $(this).parents('li.block').first();
		

		// The new Black
		if($clicked.hasClass('block-edit')) {
			console.log('Clicked');
		}
		if($clicked.hasClass('delete')) {
			mtheme.undo.prototype.setStorage();
			$parent.find('> .block-bar .block-handle').css('background', '#8c8c8c');
			$parent.fadeOut();
			setTimeout(function() {
				$parent.remove();
				update_block_order();
				update_block_number();
			},500);
			$(this).tooltip('hide');
		} else if($clicked.hasClass('closeTab')) {
			$parent.find('> .block-bar a.block-edit').click();
		} else if($clicked.hasClass('export')) {
			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					exportedData : $clicked.parents('li.block')[0].outerHTML,
					action : 'content_builder_export_certain_block'
				},
				success: function(data) {
					$("#exportedBlock").html(data);
				}
			});
 		} else if($clicked.hasClass('clone')) {
			mtheme.undo.prototype.setStorage();
			if($('.justAppended').length == 0) {
				$('li.block').last().addClass('justAppended');
			}
			if(isNaN($('.justAppended').attr('id').substring(15))) {
				var parent_id = $parent.attr('id').substring(15);
				// var last_id = $('.justAppended').attr('id').substring(15);
			} else {
				var parent_id = parseInt($parent.attr('id').substring(15));
				// var last_id = parseInt($('.justAppended').attr('id').substring(15));
			}
			// parent_id_cloned = last_id + 1;
			parent_id_cloned = makeid();
			$parent.find('input:text').each(function() {
			    $(this).attr('value', $(this).val());
			});
			$parent.find('input[type="number"]').each(function() {
				$(this).attr('value',$(this).val());
			});
			$parent.find('input:checkbox').each(function() {
				if($(this).attr('checked')) {
					$(this).attr('checked','checked');
				}
			});
			$parent.find('select').each(function(index,element) {
				$(element).children('option').each(function(indexy,elementy) {
					if($(elementy).val() == $(element).val()) {
						$(elementy).attr('selected','selected');
					}
				});
			});
			$parent.find('textarea').each(function() {
				$(this).text($(this).val());
			});


			var checked_radio_tab = new Array;
				$parent.find('.iconselector').each(function(index,element) {
					$(this).find('input:radio:checked').each(function(index1,element1) {
						checked_radio_tab[index1,index] = $(element1).val();
					});
				});
			var checked_radio_tab = new Array;
			$parent.find('.radioBtnWrapper').each(function(index,element) {
				$(this).find('input:radio:checked').each(function(index1,element1) {
					checked_radio_tab[index1,index] = $(element1).val();
				});
			});
				var $cloned_element = $parent.clone();
				$('.justAppended').removeClass('justAppended');
				$cloned_element.addClass('justAppended');

				$('.justAppended').find('.aq_block_' + parent_id_cloned+'_tabs_editor_tabbed').each(function(index,element) {
				   tinyMCE.execCommand( ' mceRemoveEditor', true, $(element).attr('id'));
			    });
			    setTimeout(function() {
			    	$('.justAppended').find('.mce-tinymce').remove();
			    },500);
			    $('.justAppended').find('.mce-tinymce').remove();
				$cloned_element.appendTo($parent.parent('ul.blocks'));
				$parent.find('.iconselector').each(function(index,element){
					$(this).find('input:radio').each(function(index1,element1){
						for (var i=0; i < checked_radio_tab.length; i++) {
							if($(element1).val() == checked_radio_tab[i,index]) {
								$(element1).attr('checked','checked');
							}
						}
					});
				});
				$parent.find('.radioBtnWrapper').each(function(index,element){
					$(this).find('input:radio').each(function(index1,element1){
						for (var i=0; i < checked_radio_tab.length; i++) {
							if($(element1).val() == checked_radio_tab[i,index]) {
								$(element1).attr('checked','checked');
							}
						}
					});
				});

			var s = $parent.parent('ul.blocks').children('li').last()[0].outerHTML;
                        var tagRegex = new RegExp('<\\w+((?:\\s[\\w-]+=(\'|")(?:[^\\2]*?)(?:\\2))+)[\\s\\/]*>', 'gim');
                        var attsRegex = new RegExp('(?:\\s[\\w-]+=(\'|")([^\\1]*?)(?:\\1))', 'gim');
                        var replaceSlugs = [ 'template-block-', 'my-content-', 'block-settings-', 'aq_block_' ];
                        var replacmentRegex = new RegExp( '((' + replaceSlugs.join( '|' ) + ')' + parent_id + ')', 'gim' );
						var ns = s.replace(tagRegex, function(match){
                            return match.replace( attsRegex, function( match ) {
                                return match.replace( replacmentRegex, function( match, p1, p2 ) {
                                    //p2 is the slug without the id;
                                    return p2 + parent_id_cloned;
                                } );
                            } );
			});

			$parent.parent('ul.blocks').children('li').last()[0].outerHTML = ns;
			$parent.parent('ul.blocks').children('li').last().removeClass('ui-resizable');
			$parent.parent('ul.blocks').children('li').last().find('.ui-resizable-handle').remove();
			resizable_certain_block($('.justAppended'));
			$this = $clicked;
			var id_name = parent_id_cloned;
			$("#aq_block_"+id_name).insertBefore($("#aq_block_"+id_name).parents('.wp-editor-wrap .wp-editor-container > span'));
			$("#aq_block_"+id_name).show().next('.wp-editor-wrap .wp-editor-container > span').remove();
			var cloned_number = parseInt($('.justAppended').prev().find('.number').val()) + 1;
			$parent.closest('ul.blocks').children('li').last().children('.block-settings').find('.number').val(cloned_number);
			$('li.block').last().find('.order').val($('ul.blocks li.block').length);
			$('.icons .radioButtonIcon i.fontawesome_icon').click(function(){
				$(this).parent().children('input').attr('checked','checked');
				$(this).parents('.icons').find('i.fontawesome_icon').removeClass('click checked');
				$(this).addClass('click');
			});
			aqpb_colorpicker();
			if($('.justAppended').find('.wp-picker-container').find('.wp-picker-container').length !== 0 ) {
				$('.justAppended ul li').find('.sortable-body > .wp-picker-container').each(function(index,element) {
					$(element).find('.wp-color-result').first().remove();
				});
				$('.justAppended').find('.rightHalf > .aqpb-color-picker > .wp-picker-container').each(function(index,element) {
					$(element).find('.wp-color-result').first().remove();
				});
			}
			handleSize($cloned_element.children('div'));
			$('.justAppended').addClass(animation_class + ' ' + animation_add );
			tooltip_builder();
			$('select[id*="entrance_animation"]').change(function() {
				var class_added=$(this).val();
				$(this).parents('.select').find('.entrance_animation_sim').removeClass().addClass('entrance_animation_sim');
				$('.entrance_animation_sim').addClass(class_added);
			});
			aq_sortable_list_init();
		}
		return false;
	});

	/** Disable blocks archive if no template **/
	$('#page-builder-column.metabox-holder-disabled').click( function() { return false; });
	$('#page-builder-column.metabox-holder-disabled #blocks-archive .block').draggable("destroy");

	/** Confirm delete template **/
	$('a.template-delete').click( function() {
		var agree = confirm('You are about to permanently delete this template. \'Cancel\' to stop, \'OK\' to delete.');
		if(agree) { return } else { return false; }
	});

	/** Cancel template save/create if no template name **/
	$('#save_template_header, #save_template_footer').click(function() {
		var template_name = $('#template-name').val().trim();
		if(template_name.length === 0) {
			$('.major-publishing-actions .open-label').addClass('form-invalid');
			return false;
		}
	});

	/** Nav tabs scrolling **/
	if(720 < tabs_width) {
		$('.aqpb-tabs-arrow').show();
		centerActiveTab();
		$('.aqpb-tabs-arrow-right a').mousedown(function() {
			mouseStilldown = true;
		    moveTabsLeft();
		}).bind('mouseup mouseleave', function() {
		    mouseStilldown = false;
		});

		$('.aqpb-tabs-arrow-left a').mousedown(function() {
			mouseStilldown = true;
		    moveTabsRight();
		}).bind('mouseup mouseleave', function() {
		    mouseStilldown = false;
		});
	}

	/** Sort nav order **/
	$('.aqpb-tabs').sortable({
		items: '.aqpb-tab-sortable',
		axis: 'x',
	});

	/** Apply CSS float:left to blocks **/
	$('li.block').css('float', '');

	$('.emptyTemplates').click(function(e) {
		e.preventDefault();
		mtheme.undo.prototype.setStorage();
		$("#blocks-to-edit").html('');
	});
	
	saveTemplate();

	function saveTemplate() {
		$('#saveBuilderTemplates').off('click');
		$('#saveBuilderTemplates').on('click',function(e) {

			var save_template_button_text = $(this).text();
			$this = $(this);
			e.preventDefault();
			if($('#saveTemplateName').val() == ''){
				$('#saveTemplateName').val(aqjs_script_vars.newtemplate);
			}

			var data_body = $('#aqpb-body');
			var archive_body = $('#blocks-archive');

			archive_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);
			data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);

			var datafields,data_keys;
			datafields='';
			data_keys='';

			datafields += '<div id="template-export-temp">';

			$("#blocks-to-edit > li").each(function() {
				//console.log( $(this) );
				var template_id_num = $(this).attr('id');
				var pagedata = $(this).find("select,textarea, input").serialize();
				//console.log(template_id_num,pagedata);
				datafields += '<textarea id="mbuild_data_'+template_id_num+'" style="display:none" name="mbuild_data_'+template_id_num+'">'+ pagedata +'</textarea>';
				data_keys += template_id_num + ',';

			});

			datafields += '<input id="mbuilder_datakeys" style="display:none" name="mbuilder_datakeys" value="'+data_keys+'">';
			datafields += '</div>';
			//console.log('data key is:' + data_keys);
			//data_body.append('<input id="mbuilder_datakeys" style="display:true" name="mbuilder_datakeys" value="'+data_keys+'">');
			data_body.after(datafields);

			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data: $("#template-export-temp").find("select,textarea, input").serialize() + '&action=content_builder_save_templates&saveTempName='+$('#saveTemplateName').val(),
				beforeSend : function() {
					$this.attr('disabled','disabled').text(aqjs_script_vars.saving);
				},
				success: function(data) {
					//console.log(data);
					$('#template-templates').append("<option value='"+data+"' class='manuallySaved'>"+data+"</option>");
					templateChange();
					$('#saveTemplateName').val('');
					$('#saveTemplatePopover').parent().popover('hide');
					$('#template-export-temp').remove();
					$this.removeAttr('disabled').text(save_template_button_text);
				},
				complete : function() {
					$this.removeAttr('disabled').text(save_template_button_text);
				},
	            error     : function(jqXHR, textStatus, errorThrown) {
	                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                $this.removeAttr('disabled').text(save_template_button_text);
	            }
			});
		});

		$('#closeSaveBuilderTemplates').click(function(e) {
			e.preventDefault();
			$('#saveTemplatePopover').parent().popover('hide');
			console.log('hola');
		});

	}




		$('#mtheme-pb-delete-template button').click(function(e) {
			$this = $(this);
			e.preventDefault();
			if($('#template-templates option:selected').hasClass('manuallySaved')) {
				$.ajax({
					url: global_mtheme.ajax_url,
					type: "POST",
					data : {
						getTemp : $('#template-templates').val(),
						action : 'content_builder_delete_templates'
					},
					success: function(data) {
						$("#blocks-to-edit").html('');
						$('#template-templates option:selected').remove();
					},
					complete : function() {
						$('#mtheme-pb-delete-template').modal('hide');
					}
				});
			} else {
				//alert("This Template is from the defaults and cannot be deleted");
				$('#mtheme-pb-delete-template').modal('hide');
				$('#cantbedeleted').modal('show') 
			}
		});
		$('#retrievePosts').click(function(e) {
			$this = $(this);
			$("#retrieveBuilderTemplate").text(aqjs_script_vars.retrieving);
			var data_body = $('#aqpb-body');
			data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);
			var savedata = $('#aqpb-body').find("select,textarea, input").serialize();

			e.preventDefault();
			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data: {
					pageBlocks:  $('#blocks-to-edit').html(),
					action: 'content_builder_retrieve_blocks'
				},
				success: function(data) {
					$("#retrieveBuilderTemplate").text(data);
				}
			});
		});

		var importing_ajax_done = false;


		function mtheme_get_pageblocks_data() {

			var datafields_array=[];
			var data_keys;
			var count=0;
			var pagedata;
			var template_id_num;

			data_keys='';

			items = new Array();
			items[0] = new Object();

			$("#blocks-to-edit > li").each(function() {
				//console.log( $(this) );
				template_id_num = $(this).attr('id');
				pagedata = $(this).find("select,textarea, input").serialize();
				//console.log(template_id_num,pagedata);
				datafields_array[template_id_num] =  pagedata;
				items[0][template_id_num] = pagedata;
				//data_keys += template_id_num + ',';
				//count++;
			});

			// Store template keys
			//datafields_array['ids'] = data_keys;
			// Store the data

			return items;
		}


		function mtheme_ready_and_save_builderdata() {

			var check_builder_active;
			check_builder_active = $('#mtheme_pb_isactive').val();

			console.log(check_builder_active);

			var data_body = $('#aqpb-body');
			var archive_body = $('#blocks-archive');

			if (check_builder_active=="1") {
				var num_form_elements = data_body.find('input, select, textarea').not('[type="submit"]').length;
				var num_elements_already_disabled= data_body.find('input:disabled, select:disabled, textarea:disabled').length;
				enabled = (num_form_elements-num_elements_already_disabled);


				archive_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);
				data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", false);

				var datafields,data_keys;
				datafields='';
				data_keys='';

				$("#blocks-to-edit > li").each(function() {
					//console.log( $(this) );
					var template_id_num = $(this).attr('id');
					var pagedata = $(this).find("select,textarea,input").serialize();
					//console.log(template_id_num,pagedata);
					datafields += '<textarea id="mbuild_data_'+template_id_num+'" style="display:none" name="mbuild_data_'+template_id_num+'">'+ pagedata +'</textarea>';
					data_keys += template_id_num + ',';

				});

				//var savedata = $('#aqpb-body').serialize();
				//var savedata = $('#aqpb-body').find("select,textarea, input").serialize();
				archive_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", true);
				data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", true);
				//data_body.append('	<input name="num_form_elements" value="'+num_form_elements+'">');
				//data_body.append('	<input name="num_elements_already_disabled" value="'+num_elements_already_disabled+'">');
				//data_body.append('<textarea id="mbuilder_serialized_data" style="display:true" name="mbuilder_serialized_data">'+ savedata +'</textarea>');
				console.log('data key is:' + data_keys);
				data_body.append('<input id="mbuilder_datakeys" style="display:none" name="mbuilder_datakeys" value="'+data_keys+'">');
				data_body.append(datafields);
			} else {
				// Disable builder data fields - not in builder mode.
				archive_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", true);
				data_body.find('input, select, textarea').not('[type="submit"]').attr("disabled", true);
			}
		}

		$( "#post" ).submit(function( e ) {
			var btnpressed = $(document.activeElement);
			var btnpressID = btnpressed.attr('id');
			console.log( btnpressID );
			if ( btnpressID == "post-preview") {
				// Displaying preview
				console.log('Previewing');
			} else {
				mtheme_ready_and_save_builderdata();
			}
		});

		$('#publish').click(function(e) {

			$('#publishing-action .spinner').show();
			if($("#post_type").val() == 'page') {
				if($("#importBuilderTemplate").val() !== '') {
					if (importing_ajax_done == true) {
				        importing_ajax_done = false; // reset flag
				        return; // let the event bubble away
				    }
				    e.preventDefault();
					$.ajax({
						url: global_mtheme.ajax_url,
						type: "POST",
						data : {
							importedData : $("#importBuilderTemplate").val(),
							action : 'content_builder_import_templates'
						},
						success: function(data) {
							importing_ajax_done = true;
							 $('#publish').trigger('click');
							 // $('#publishing-action .spinner').hide();
						}
					});
				} else if($("#importPageBlocks").val() !== '' && !$("#importPageBlocks").hasClass('publishPost') && $("#importPageBlocks").val() !== undefined) {
					e.preventDefault();
					var confirmthis = confirm("Please note that you will overwrite the page blocks with the imported ones");
					if(confirmthis) {
						$.ajax({
							url: global_mtheme.ajax_url,
							type: "POST",
							data : {
								blocks : $("#importPageBlocks").val(),
								postID : $(".saveTemplates").data('postid'),
								action : 'content_builder_save_blocks'
							},
							success: function(data) {
								$("#importPageBlocks").addClass("publishPost");
								$('.blocks').html(data);
								$("#publish").click();
								// $('#publishing-action .spinner').hide();
							}
						});
					}
				} else {

				}
			}
		});

		// Get a saved Revision History
		$("#em_revisions").change(function() {
			var requested_history = $(this).find('option:selected').data('revision');
			if(requested_history !== undefined) {
				$.ajax({
						url: global_mtheme.ajax_url,
						type: "POST",
						data : {
							history : requested_history,
							postID  : $("#post_ID").val(),
							action  : 'content_builder_get_history'
						},
						beforeSend : function() {
							$('.loaderOverlay, .preloader').removeClass('hide');
							$("#page-builder .preloader").css('top',$(window).scrollTop() - 350);
						},
						success: function(data) {
							mtheme.undo.prototype.setStorage();
							$("#blocks-to-edit").html(data);
							$('ul.blocks li.block.ui-resizable').removeClass('ui-resizable');
							$('ul.blocks li.block .ui-resizable-handle').remove();
							resizable_blocks();
							$('.loaderOverlay, .preloader').addClass('hide');
						}
					});
			}
		});
	$("#blocks-archive .ui-tabs-panel li").click(function() {
		block_archive = $(this).attr('id');
		$(this).clone().appendTo($("#blocks-to-edit"));
		$cloned_element = $("#blocks-to-edit > li").last();
		$cloned_element.removeAttr( 'style' );
		$cloned_element.addClass("ui-draggable");

		onSortStop(null, {item: $cloned_element});
		$cloned_element.addClass(animation_class + ' ' + animation_add );
		$('.empty-template').fadeOut( "fast", function() {
			// Animation complete.
			$('.empty-template').fadeOut().remove();
		});
	});

	var timeOut;
	$('#blocks-archive li.block').hover(function() {
		$this = $(this);
		timeOut = setTimeout(function() {
			$this.find('.block-popup').stop(true,true).fadeIn(500);
		},1000);
		var height = parseInt($this.find('.block-popup').height(),10)+50;
		$this.find('.block-popup').css('margin-top',-height);
	},function() {
		$('.block-popup').fadeOut(500);
		clearTimeout(timeOut);
	});

	function aqpb_colorpicker() {
		$('#page-builder .input-color-picker').each(function(){
			var $this	= $(this),
				parent	= $this.parent();
				$this.wpColorPicker();
		});
	}
	function resizePlus(element,e) {
		// remove the current class and increase it by one
		e.preventDefault();
		mtheme.undo.prototype.setStorage();
		if(element.parents('li.block').hasClass('mtheme-columns')) {
			if(element.parents('.mtheme-columns').find('.size').last().val() !== element.parents('li.block').first().find('.size').val()) {
				var currentSpan = block_size_incolumn( element.parents('li.block').first().width(), element.parents('.mtheme-columns'));
				var currentSpanNum = parseInt(currentSpan.substring(4)) + 1;
				if(currentSpanNum <= 12) {
					element.parents('li.block').first().toggleClass( function (index, css) {
						return (css.match (/\bspan\S+/g) || []).join(' ') + ' span' + currentSpanNum;
					});
					element.parents('li.block').first().find('.block-settings').find('.size').val('span'+currentSpanNum );
				}
				// Call the function to write the number on the block
				handleSize(element);
			}
		}
		else {
			var currentSpan = block_size( element.parents('li.block').first().width());
			var currentSpanNum = parseInt(currentSpan.substring(4)) + 1;
				if(currentSpanNum <= 12) {
					element.parents('li.block').first().toggleClass( function (index, css) {
						return (css.match (/\bspan\S+/g) || []).join(' ') + ' span' + currentSpanNum;
					});
					element.parents('li.block').first().find('.block-settings').find('.size').val('span'+currentSpanNum );
				}
				// Call the function to write the number on the block
				handleSize(element);
		}
	}
	function resizeMinus(element,e) {
		e.preventDefault();
		mtheme.undo.prototype.setStorage();

		if(element.parents('li.block').hasClass('mtheme-columns'))
				var currentSpan = block_size_incolumn( element.parents('li.block').first().width(), element.parents('.mtheme-columns'));
		else
				var currentSpan = block_size( element.parents('li.block').first().width());

		var currentSpanNum = parseInt(currentSpan.substring(4)) - 1;
		if(currentSpanNum >= 2) {
			element.parents('li.block').first().toggleClass( function (index, css) {
				return (css.match (/\bspan\S+/g) || []).join(' ') + ' span' + currentSpanNum;
			});
			element.parents('li.block').first().find('.block-settings').find('.size').val('span'+currentSpanNum );
		}
		// Call the function to write the number on the block
		handleSize(element);
		// Prepare for undo and redo
	}

	function handleSize(element) {
		// it is a column
		if(element.parents('li.block').hasClass('mtheme-columns')) {
			element.parents('.mtheme-columns').find('.block-size').first().text(parseInt(element.parents('.mtheme-columns').find('.size').last().val().substring(4)) + '/12');
			// check for an elements inside it
			if(element.parents('li.block').find('li.block').length) {
				// there are some elements inside it
				element.parents('li.block').find('li.block').each(function (count,small_element) {
					$(small_element).find('.block-size').first().text($(small_element).find('.size').last().val().substring(4)+'/12');
				});
			} else {
				// it is a column but with no blocks inside it
				element.parents('.mtheme-columns').find('.block-size').first().text(parseInt(element.parents('.mtheme-columns').find('.size').last().val().substring(4)) + '/12');
			}
		} else {
			element.parents('li.block').find('.block-size').text(parseInt(element.parents('li.block').find('.size').last().val().substring(4)) + '/12');
		}

	}

		function tooltip_builder() {
			$('a[data-tooltip="tooltip"]').tooltip({
			   animated : 'fade',
			   placement : 'top',
			   container: 'body'
			});
		}

		$('select[id*="entrance_animation"]').change(function() {
			var class_added=$(this).val();
			$(this).parents('.select').find('.entrance_animation_sim').removeClass().addClass('entrance_animation_sim');
			$('.entrance_animation_sim').addClass(class_added);
		});

		$(window).scroll(function() {
			$("#page-builder .preloader").css('top',$(window).scrollTop() - 350);
		});
		$('body').append('<div class="loaderOverlay hide"></div>');

		$('.import-a-block').click(function() {
			$(this).find('div').show();
		});

		$('.exportToggle').click(function() {
			$('#exportBuilderTemplate').val('');
		});
		// Retrieve Export Templates data
		$('.exportToggle').click(function() {
			var block_export_button = $('#mtheme-pb-export-templates button');
			var block_export_button_text = $(block_export_button).text();
			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					action : 'content_builder_export_templates'
				},
				beforeSend : function() {
					$(block_export_button).attr('disabled','disabled').text('Retrieving...');
				},
				success: function(data) {
					$('#exportBuilderTemplate').val(data);
					$(block_export_button).removeAttr('disabled').text(block_export_button_text);
				},
				complete : function() {
					$(block_export_button).removeAttr('disabled').text(block_export_button_text);
				},
	            error     : function(jqXHR, textStatus, errorThrown) {
	                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                $(block_export_button).removeAttr('disabled').text(block_export_button_text);
	            }
			});
		});

		$('.importToggle').click(function() {
			$('#importdata-error').html('').hide();
		});	
		$('#toggle-preset-buttons').click(function() {
			$('#mtheme-preset-templates').fadeToggle('fast');
			$(this).toggleClass('presets-displayed');
		});
		$('.presetToggle').click(function() {
			$('#mtheme-preset-templates').fadeOut();
			$('#toggle-preset-buttons').toggleClass('presets-displayed');
			$('#preset-template-error').hide();
			var presetName = $(this).parent('.preset-template').data('title');
			var presetSlug = $(this).parent('.preset-template').data('template');
			$('.preset-template-name').text(presetName);
			$('#mtheme-preset-slug').val(presetSlug);
		});
		$('#mtheme-preset-template-confirm button').click(function() {
			var block_import_button = $(this);
			var block_import_button_text = $(block_import_button).text();

			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					templateName : $("#mtheme-preset-slug").val(),
					action : 'builder_import_preset_template'
				},
				beforeSend : function() {
					$(block_import_button).attr('disabled','disabled').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
				},
				success: function(data) {
					importing_ajax_done = true;

					console.log('importing..');
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);

					if( data === undefined || !data || data.length == 0 ) {
						$('#preset-template-error').fadeIn().delay(1000);
					} else {
						$("#blocks-to-edit").html(data);
						checkStack();
						update_block_order();
						update_block_number();
						$('ul.blocks li.block.ui-resizable').removeClass('ui-resizable');
						$('ul.blocks li.block .ui-resizable-handle').remove();
						resizable_blocks();
						columns_sortable();
						aq_sortable_list_init();
						aqpb_colorpicker();
						if($('ul.blocks li').find('.wp-picker-container').find('.wp-picker-container').length !== 0 ) {
							$('ul.blocks li ul li').find('.sortable-body > .wp-picker-container').each(function(index,element) {
								$(element).find('.wp-color-result').first().remove();
							});
							$('ul.blocks li').find('.rightHalf > .aqpb-color-picker > .wp-picker-container').each(function(index,element) {
								$(element).find('.wp-color-result').first().remove();
							});
						}
						$('#mtheme-preset-template-confirm').modal('hide');
					}
				},
				complete : function() {
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);
				},
	            error     : function(jqXHR, textStatus, errorThrown) {
	                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                $(block_import_button).removeAttr('disabled').text(block_import_button_text);
	            }
			});
		});
		// Import All Templates
		$('#mtheme-pb-import-templates button').click(function() {
			var block_import_button = $(this);
			var block_import_button_text = $(block_import_button).text();

			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					importedData : $("#importBuilderTemplate").val(),
					action : 'content_builder_import_templates'
				},
				beforeSend : function() {
					$(block_import_button).attr('disabled','disabled').text('Importing...');
				},
				success: function(data) {
					importing_ajax_done = true;

					console.log(data);
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);

					if( data === undefined || !data || data.length == 0 ) {
						$('#importdata-error').html('Import data not vaild!').fadeIn().delay(1000).fadeOut();
					} else {
						$('#template-templates')
							.find('option')
							.remove()
							.end()
							.append(data);

						$('#mtheme-pb-import-templates').modal('hide');
					}

				},
				complete : function() {
					$('#importBuilderTemplate').val('');
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);
				},
	            error     : function(jqXHR, textStatus, errorThrown) {
	                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                $(block_import_button).removeAttr('disabled').text(block_import_button_text);
	            }
			});
		});


		$('#import-a-block').click(function() {
			$('#mtheme-pb-import-a-block textarea').val('');
		});
		$('#mtheme-pb-import-a-block button').click(function() {
			var block_import_button = $(this);
			var block_import_button_text = $(block_import_button).text();
			$(this).find('div').show();
			$.ajax({
				url: global_mtheme.ajax_url,
				type: "POST",
				data : {
					importedData : $('#mtheme-pb-import-a-block textarea').val(),
					action : 'content_builder_import_certain_block'
				},
				beforeSend : function() {
					$(block_import_button).attr('disabled','disabled').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
				},
				success: function(data) {
					mtheme.undo.prototype.setStorage();
					$("#blocks-to-edit").append(data);
					if($('.block').last().find('.id_base').val() == 'em_icon_box')
					{
						$('.block').last().find('.id_base').val('em_features_home');
					}
					checkStack();
					update_block_order();
					update_block_number();
					$('ul.blocks li.block.ui-resizable').removeClass('ui-resizable');
					$('ul.blocks li.block .ui-resizable-handle').remove();
					resizable_blocks();
					columns_sortable();
					$('#mtheme-pb-import-a-block textarea').html('');
					$('#mtheme-pb-import-a-block').modal('hide');
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);
				},
				complete : function() {
					$(block_import_button).removeAttr('disabled').text(block_import_button_text);
				},
	            error     : function(jqXHR, textStatus, errorThrown) {
	                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                $(block_import_button).removeAttr('disabled').text(block_import_button_text);
	            }
			});
		});
		$.expr[":"].contains = $.expr.createPseudo(function(arg) {
		    return function( elem ) {
		        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
		    };
		});
		$('#mtheme-pb-live-search').keyup(function(e) {
			$("#blocks-archive li.block").hide();
			$("#blocks-archive > .ui-tabs-panel").hide();
			// $("#blocks-archive > ul").css({'display':'block'});
			// $("#blocks-archive > ul:first-child").css({'margin-bottom':'10px'});
			$("#blocks-archive > ul:first-child .ui-state-default").addClass('hide');
			$( ".block-title:contains('"+$(this).val()+"')" ).parents('.block').show().parents('.ui-tabs-panel').show();

			// $("#blocks-archive > .ui-tabs-panel").css('padding', '0px').first().css({'float':'left'});
			// $("#blocks-archive").css('padding-bottom', '10px');

			var title = $('.ui-tabs-nav a').text();
			$('.searchTitles').remove();
			$('.ui-tabs-nav li.ui-state-default').each(function(index,element) {
				$("<li class='searchTitles "+$(element).find('a').attr('href').slice(1)+"' style='display:none;'><h2 style='margin: 0 auto;display: table;background: none;'>"+$(element).find('a').text()+"</h2></li>").insertBefore("#"+$(element).find('a').attr('href').slice(1));
			});
			$( ".block-title:contains('"+$(this).val()+"')" ).parents('.ui-tabs-panel').each(function(index,element) {
				$('.'+$(element).attr('id')).show();
			});


			if($(this).val() == '') {
				$("#blocks-archive li.block").show();
				// $("#blocks-archive > ul:first-child").css({'margin-bottom':'0'});
				$("#blocks-archive > ul:first-child .ui-state-default").removeClass('hide');
				$("#blocks-archive > ul.ui-tabs-panel").hide();
				$("#blocks-archive > .ui-tabs-panel").first().show();
				$('#blocks-archive > .ui-tabs-nav').css('display','');
				// $("#blocks-archive > .ui-tabs-panel").css({'padding':''});
				// $("#blocks-archive").css('padding-bottom', '');
				// $("#blocks-archive > ul").css('float','');
				$('.searchTitles').remove();
			}
		});

		$('.modal.block-settings').on('shown.bs.modal', function (e) {
			  $('.block-settings .modal-content').bind("keyup keypress", function(e) {
			  	var target = $( e.target );

			  	console.log(target.attr('id'));
				var code = e.keyCode || e.which;
				console.log(e);
				if (code  == 13) {
					if (!target.is("textarea")) {
					    e.preventDefault();
					    return false;
					}
				}
			});
		}).on('hidden.bs.modal', function (e) {
			  $('#post').bind("keyup keypress", function(e) {
			  	return true;
			});
		});


	/** Modal Fields
	----------------------------------------------- */

	/** Colorpicker Field
	----------------------------------------------- */
	function aqpb_colorpicker() {
		$('#page-builder .input-color-picker').each(function(){
			var $this	= $(this),
				parent	= $this.parent();

			$this.wpColorPicker();

//			hide picker if click away
		});
	}

	aqpb_colorpicker();

	$('ul.blocks').bind('sortstop', function() {
		aqpb_colorpicker();
	});

	/** Media Uploader
	----------------------------------------------- */
	$(document).on('click', '.aq_upload_button', function(event) {
		var $clicked = $(this), frame,
			input_id = $clicked.prev().attr('id'),
			media_type = $clicked.attr('rel');

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}

		// Create the media frame.
		frame = wp.media.frames.customHeader = wp.media({
			// Set the media type
			library: {
				type: media_type
			},
		});

		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
				$('#' + input_id).val(attachment.attributes.url);
				$('#' + input_id).prevAll('.screenshot').attr('src', attachment.attributes.url);
				console.log(attachment.id);
				$('#' + input_id).prev().val(attachment.id);
		});

		frame.on('open', function() {
			//console.log('Opened here...');
			$('#aqpb-body .block-settings.modal.in').hide();
		})
		.on('close', function() {
			//console.log('Closed here...');
			$('#aqpb-body .block-settings.modal.in').show();
		})

		frame.open();

	});
	$(document).on('click', '.remove_image', function(event) {
		var $clicked = $(this),
			input_id = $clicked.prev().prev().attr('id');

		event.preventDefault();
		//Clear
		$('#' + input_id).val('');
		$('#' + input_id).prevAll('.screenshot').attr('src', '');
		$('#' + input_id).prev().val('');

	});

	/** Sortable Lists
	----------------------------------------------- */
	// AJAX Add New <list-item>
	function aq_sortable_list_add_item(action_id, items) {

		var blockID = items.attr('rel'),
			numArr = items.find('li').map(function(i, e){
				return $(e).attr("rel");
			});

		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;
		var data = {
			action: 'aq_block_'+action_id+'_add_new',
			security: $('#aqpb-nonce').val(),
			count: newNum,
			block_id: blockID
		};
		$.post(ajaxurl, data, function(response) {
			var check = response.charAt(response.length - 1);
			//console.log(data);
			//check nonce
			if(check == '-1') {
				alert('An unknown error has occurred');
			} else {
				items.append(response);
				aqpb_colorpicker();
				$('.aq-sortable-add-new').text('Add New');
				$('.aq-sortable-add-new span').remove();

				//console.log(blockID,newNum);
				//aq-sortable-list-aq_block_1
				
				$('#' + blockID + '_tabs-sortable-item-' + newNum ).find('.child-richtext-block').each(function(index,element) {
					richtext_child_id = $(this).attr( 'id' );
					tinyMCE.init({ mode : "none"});
					tinyMCE.execCommand('mceAddEditor', false, richtext_child_id );
				});
			}

		});
	};

	// Initialise sortable list fields
	function aq_sortable_list_init() {
		$('.modal-body .aq-sortable-list').sortable({
			containment: "parent",
			tolerance: "pointer",
			placeholder: "ui-state-highlight",
			start: function(event, ui) {
				$(this).find('.child-richtext-block').each(function(index,element) {
					//console.log(index,element);
					richtext_child_id = $(this).attr( 'id' );
					//tinyMCE.get( richtext_child_id ).save();
					var richtext_value = tinyMCE.get(richtext_child_id).getContent();
					$('#' + richtext_child_id).html(richtext_value);
					tinyMCE.execCommand( 'mceRemoveEditor', true, richtext_child_id );
				});
			},
		    stop: function(event, ui) { 
				$(this).find('.child-richtext-block').each(function(index,element) {
					//console.log(index,element);
					richtext_child_id = $(this).attr( 'id' );
					tinyMCE.init({ mode : "none"});
					tinyMCE.execCommand('mceAddEditor', false, richtext_child_id );
				});
		    },
			update: function () {
    			//console.log('updated sortable in modal');
  			}
		});
	}
	aq_sortable_list_init();

	$('ul.blocks').bind('sortstop', function() {
		aq_sortable_list_init();
	});


	$(document).on('click', 'a.aq-sortable-add-new', function() {
		var action_id = $(this).attr('rel'),
			items = $(this).parent().children('ul.aq-sortable-list');
			$(this).text('');
			$(this).append('<span class="fa fa-circle-o-notch fa-spin"></span>');
		aq_sortable_list_add_item(action_id, items);

		$('.modal-body .aq-sortable-list').sortable({
			containment: "parent",
			tolerance: "pointer",
			placeholder: "ui-state-highlight"
		});

		return false;
	});

	// Delete Sortable Item
	$(document).on('click', '.aq-sortable-list a.sortable-delete', function() {
		var $parent = $(this.parentNode.parentNode.parentNode);
		$parent.children('.block-tabs-tab-head').css('background', 'red');
		$parent.slideUp(function() {
			$(this).remove();
		}).fadeOut('fast');
		return false;
	});

	$(document).on('click', '.aq-sortable-list .sortable-out-delete', function() {
		var $parent = $(this.parentNode.parentNode);
		$parent.children('.block-tabs-tab-head').css('background', 'red');
		if($parent.find('.wp-editor-area').attr('id')) {
			tinyMCE.execCommand( 'mceRemoveControl', false, $parent.find('.wp-editor-area').attr('id'));
		}
		$parent.slideUp(function() {
			$(this).remove();
		}).fadeOut('fast');
		return false;
	});

	// Open/Close Sortable Item
	$(document).on('click', '.aq-sortable-list .sortable-handle a', function() {
		var $clicked = $(this);

		$clicked.addClass('sortable-clicked');
		$('.icons .radioButtonIcon i.iconfontello').click(function(){
				$(this).parent().children('input').attr('checked','checked');
				$(this).parents('.icons').find('i.iconfontello').removeClass('click checked');
				$(this).addClass('click');
			});
			$('.icons .radioButtonIcon input[checked="checked"]').each(function(){
				$(this).parent().children('i').addClass('checked');
			});
		$clicked.parents('.aq-sortable-list').find('.sortable-body').each(function(i, el) {
			if($(el).is(':visible') && $(el).prev().find('a').hasClass('sortable-clicked') == false) {
				$(el).slideUp();
			}
		});
		$(this.parentNode.parentNode.parentNode).children('.sortable-body').slideToggle();

		$clicked.removeClass('sortable-clicked');

		return false;
	});

});