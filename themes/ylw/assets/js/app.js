(function($) {
var windowWidth = $(window).width();
var windowHeight = $(window).height();

/**
* Global functions
*/
function getScreenSize(){
  return $(window).width();
}
function getScreenHeight(){
  return $(window).height();
}
function getElementWidth( $el ){
  if( $($el).length ){
    return ($el).outerWidth();
  }
  return false;
}
function getElementHeight( $el ){
  if( $($el).length ){
    return ($el).outerHeight();
  }
  return false;
}

/**
* Mobile functions
*/
function isLG(){
  var windowWidth = $(window).width();
  if( windowWidth >= 1200 ){
    return true;
  }
  return false;
}
function isMD(){
  var windowWidth = $(window).width();
  if( windowWidth <= 1199 ){
    return true;
  }
  return false;
}
function isSM(){
  var windowWidth = $(window).width();
  if( windowWidth <= 991 ){
    return true;
  }
  return false;
}
function isXS(){
  var windowWidth = $(window).width();
  if( windowWidth <= 767 ){
    return true;
  }
  return false;
}
function isXXS(){
  var windowWidth = $(window).width();
  if( windowWidth <= 575 ){
    return true;
  }
  return false;
}

/**
* Auto gaps and margins
*/
function hasGaps(){
  if( $('.gap').length ){
    $('.gap').each(function(){
      var obj = $(this).data();
      if( String(obj.xxs) && isXXS() ){
        $(this).height(obj.xxs);
      }else if( String(obj.xs) && isXS() ){
        $(this).height(obj.xs);
      }else if( String(obj.sm) && isSM() ){
        $(this).height(obj.sm);
      }else if( String(obj.md) && isMD() ){
        $(this).height(obj.md);
      }else{
        $(this).height(obj.value);
      }
    });
  }
}
function hasMargins(){
  if( $('.margin').length ){
    $('.margin').each(function(){
      var obj = $(this).data();
      if( String(obj.xxs) && isXXS() ){
        $(this).css('margin', obj.xxs);
      }else if( String(obj.xs) && isXS() ){
        $(this).css('margin', obj.xs);
      }else if( String(obj.sm) && isSM() ){
        $(this).css('margin', obj.sm);
      }else if( String(obj.md) && isMD() ){
        $(this).css('margin', obj.md);
      }else{
        $(this).css('margin', String(obj.value));
      }
    });
  }
}

function hasPaddings(){
  if( $('.padding').length ){
    $('.padding').each(function(){
      var obj = $(this).data();
      if( String(obj.xxs) && isXXS() ){
        $(this).css('padding', obj.xxs);
      }else if( String(obj.xs) && isXS() ){
        $(this).css('padding', obj.xs);
      }else if( String(obj.sm) && isSM() ){
        $(this).css('padding', obj.sm);
      }else if( String(obj.md) && isMD() ){
        $(this).css('padding', obj.md);
      }else{
        $(this).css('padding', String(obj.value));
      }
    });
  }
}

hasGaps();
hasMargins();
hasPaddings();

/**
On Resize
*/
$(window).resize(function(){
  hasGaps();
  hasMargins();
  hasPaddings();
});

})(jQuery);


function removeCatParam(val)
{
  console.log(val);
    jQuery(".wpf_item.wpf_item_wpf_cat ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#cat_"+val).fadeOut("slow", function() { 
      setTimeout(function() {
          document.location.reload();
      }, 2200);
    });
}


function removeSexParam(val)
{
  console.log(val);
    jQuery(".wpf_item.wpf_item_pa_sex ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#sex_"+val).fadeOut("slow", function() { 
      setTimeout(function() {
          document.location.reload();
      }, 2200);
    }); 
}

function removeSizeParam(val)
{
  console.log(val);
    jQuery(".wpf_item.wpf_item_pa_size ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#size_"+val).fadeOut("slow", function() { 
      setTimeout(function() {
          document.location.reload();
      }, 2200);
    }); 
}

function removeColorParam(val)
{
  console.log(val);
    jQuery(".wpf_item.wpf_item_pa_color ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#color_"+val).fadeOut("slow", function() { 
      setTimeout(function() {
          document.location.reload();
      }, 2200);
    });
}

function removeMaterialParam(val)
{
  console.log(val);
    jQuery(".wpf_item.wpf_item_pa_material ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#mat_"+val).fadeOut("slow", function() { 
      setTimeout(function() {
          document.location.reload();
      }, 2200);
    });
}

function removeCollectionParam(val)
{
    jQuery(".wpf_item.wpf_item_pa_collection ul li input[type='checkbox']:checked").filter(function() {
        return this.value == val;
    }).prop('checked', false).trigger('change');
    jQuery("#coll_"+val).fadeOut("slow", function() { 
        setTimeout(function() {
          document.location.reload();
        }, 2200);
    });
}