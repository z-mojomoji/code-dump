var mtheme = mtheme || {};
var storageArray = new Array;
var storageArrayPointer = 0;
(function($, exports){
	var em_undo = exports.undo = function(element, options) {
		this.$element = $(element);
		this.init();
		this.ready();
	};
	em_undo.prototype.init = function() {
		var self = this;
		this.prepEventListeners();
	};
	em_undo.prototype.prepEventListeners = function() {
		this.$element.on('click', ".em_undo", jQuery.proxy(this.em_undo_step, this));
		this.$element.on('click', ".em_redo", jQuery.proxy(this.em_redo_step, this));
	};
	em_undo.prototype.ready = function() {
		
	};
	em_undo.prototype.em_undo_step = function(event) {
		event.preventDefault();
		var $this = $(event.currentTarget);
		if(!$this.hasClass('disabled')) {
			this.replaceStorage();
			storageArrayPointer = storageArrayPointer - 1;
			this.getStorage();
		}
		this.checkDisabled();
		this.$element.trigger('undo.mtheme');
	};
	em_undo.prototype.em_redo_step = function(event) {
		event.preventDefault();
		var $this = $(event.currentTarget);
		if(!$this.hasClass('disabled')) {
			storageArrayPointer = storageArrayPointer + 1;
			this.getStorage();
		}
		this.checkDisabled();
		this.$element.trigger('redo.mtheme');
	};
	em_undo.prototype.replaceStorage = function() {
		storageArray[storageArrayPointer] = $("#blocks-to-edit").html();
	};
	em_undo.prototype.setStorage = function() {
		var compare = this.compareStorage();
		console.log(compare);
		if(compare) {
			storageArray = storageArray.slice(0,storageArrayPointer);
			storageArray[storageArrayPointer] = $("#blocks-to-edit").html();
			storageArrayPointer++;
			this.checkDisabled();	
		}
	};
	em_undo.prototype.getStorage = function() {
		$("#blocks-to-edit").html(storageArray[storageArrayPointer]);
		this.checkDisabled();
	};
	/*
	 * Compare this storage with previous one to check if no item is changed 
	 */
	em_undo.prototype.compareStorage = function() {
		if($("#blocks-to-edit").html() == storageArray[storageArrayPointer-1]) {
			return false;
		} else {
			return true;
		}
	};
	em_undo.prototype.checkDisabled = function() {
		$('.em_redo, .em_undo').removeClass('disabled');
		if(storageArrayPointer == storageArray.length || storageArrayPointer == storageArray.length -1) {
			$('.em_redo').addClass('disabled');
		} else if(storageArrayPointer == 0) {
			$('.em_undo').addClass('disabled');
		}
	};
	$.fn.em_undo = function(option, args) {
		return this.each(function() {
			var $this = $(this), data = $this.data('em_undo'), options = typeof option == 'object' && option;
			if (!data)
				$this.data('em_undo', ( data = new em_undo(this, options)));
			if ( typeof option == 'string')
				data[option](args);
		});
	};

	$.fn.em_undo.Constructor = em_undo;
}(jQuery, mtheme));
