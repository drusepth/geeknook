var myTips = new Tips('.project_tip');

myTips.addEvent('show', function(tip){
    tip.fade('in');
});
myTips.addEvent('hide', function(tip){
    tip.fade('out');
});

$('projectmayhem').store('tip:title', 'custom title for tip 1');

