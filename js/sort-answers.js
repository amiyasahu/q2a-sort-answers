
(function(){
  if (typeof Object.defineProperty === 'function'){
    try{Object.defineProperty(Array.prototype,'sortBy',{value:sb}); }catch(e){}
  }
  if (!Array.prototype.sortBy) Array.prototype.sortBy = sb;
 
  function sb(f){
    for (var i=this.length;i;){
      var o = this[--i];
      this[i] = [].concat(f.call(o,o,i),o);
    }
    this.sort(function(a,b){
      for (var i=0,len=a.length;i<len;++i){
        if (a[i]!=b[i]) return a[i]<b[i]?-1:1;
      }
      return 0;
    });
    for (var i=this.length;i;){
      this[--i]=this[i][this[i].length-1];
    }
    return this;
  }
})();

jQuery(document).ready(function($) {
	var AnswerReorder = {
		allAnswersItem : null , 
		answerArr : [] , 
		parentItem : $('#a_list') ,
		initialized : false ,
		currentOrder : 'default' ,
		allButtons : 'default' ,
		sortingButtons : $('#sorting-btns') ,
		reorder : function (answers) {
			this.parentItem.children("div.qa-a-list-item").remove() ;
			for (var i = answers.length - 1; i >= 0; i--) {
				if (typeof answers[i] != 'undefined') {
					$(answers[i].answerItem).prependTo('#a_list'); 
				};
			};
		}, 
		dateFormatISO : function(isoDateString) {
					var parts = isoDateString.match(/\d+/g);
					var isoTime = Date.UTC(parts[0], parts[1] - 1 , parts[2] , parts[3], parts[4], parts[5]);
					return new Date(isoTime);
				},
		init : function(){
			if (!this.initialized) {
				this.initialized = true ;
				this.allAnswersItem = $('#a_list').children("div.qa-a-list-item") ;
				if (this.allAnswersItem.length > 1) {
					$('<div style="text-align:right; class="order-btns" id="order-ans-btns">'+
						this.sortingButtons.html() +
					'</div>').insertBefore(this.parentItem);
					this.allButtons = $('#order-ans-btns').children('button') ;
					this.answerArr = [] ;
					for (var i = this.allAnswersItem.length - 1; i >= 0; i--) {
						var $currentAnsElem = $(this.allAnswersItem[i]) ,
						    itsUpvotes   = parseInt($currentAnsElem .find('span.qa-netvote-count-data span.votes-up span.value-title') .prop('title') ) ,
							itsDownvotes = parseInt($currentAnsElem .find('span.qa-netvote-count-data span.votes-down span.value-title') .prop('title') ) ,
							whenAnswered = this.dateFormatISO($currentAnsElem .find('span.qa-a-item-when .qa-a-item-when-data .published span.value-title') .prop('title') ) ;
						
						this.answerArr[i] = {
							answerItem : this.allAnswersItem[i] , 
							when : whenAnswered , 
							voteUps :  itsUpvotes , 
							voteDowns : itsDownvotes, 
							totalVotes : itsUpvotes - itsDownvotes , 
						} ; 
					};
				};
			};
		},
	};
 
	AnswerReorder.init();
	
	$('div.qa-part-a-list').on('click', '#order-ans-btns button.a_sort_oldest', function(event) {
		event.preventDefault();
		$button = $(this) ;
		if (AnswerReorder.currentOrder != 'a_sort_oldest') {
			AnswerReorder.answerArr.sortBy( function(){ return this.when} ); 
			AnswerReorder.reorder(AnswerReorder.answerArr);
			AnswerReorder.currentOrder = 'a_sort_oldest' ;
			AnswerReorder.allButtons.removeClass('active') ;
			$button.addClass('active') ;
		}
	});
 
	$('div.qa-part-a-list').on('click', '#order-ans-btns button.a_sort_newest', function(event) {
		event.preventDefault();
		$button = $(this) ;
		if (AnswerReorder.currentOrder != 'a_sort_newest') {
			AnswerReorder.answerArr.sortBy( function(){ return -this.when} ); 
			AnswerReorder.reorder(AnswerReorder.answerArr);
			AnswerReorder.currentOrder = 'a_sort_newest';
			AnswerReorder.allButtons.removeClass('active') ;
			$button.addClass('active') ;
		}
	});
 
	$('div.qa-part-a-list').on('click', '#order-ans-btns button.a_sort_highest_vote', function(event) {
		event.preventDefault();
		$button = $(this) ;
		if (AnswerReorder.currentOrder != 'a_sort_highest_vote') {
			AnswerReorder.answerArr.sortBy( function(){ return -this.totalVotes} ); 
			AnswerReorder.reorder(AnswerReorder.answerArr);
			AnswerReorder.currentOrder = 'a_sort_highest_vote';
			AnswerReorder.allButtons.removeClass('active') ;
			$button.addClass('active') ;
		}
	});
});