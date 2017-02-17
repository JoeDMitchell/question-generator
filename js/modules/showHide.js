var ShowHide = (function() {
    var s;

    return {

        settings: {
            showCheckbox: $('[data-showhide]'),
        },

        init: function() {
            s = this.settings;
            this.bindUIActions();
        },

        bindUIActions: function() {
            
            s.showCheckbox.on('change', function(){
                ShowHide.checkboxShowHide($(this));
            });

        },

        checkboxShowHide: function(el) {
            var target = el.attr('data-showhide');
            $('[data-hidden="'+target+'"]').toggle();
            console.log('boop');
        }

    };
})();
