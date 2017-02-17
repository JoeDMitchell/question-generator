var Copy = (function() {
    var s;

    return {

        settings: {
            copyButton: $('.btn-copy'),
            copyTarget: $('.copy-target'),
        },

        init: function() {
            s = this.settings;
            this.bindUIActions();
        },

        bindUIActions: function() {
            
            s.copyButton.on('click', function(){
                Copy.copyToClipboard();
            });

        },

        copyToClipboard: function() {
            s.copyTarget.selectText();
            console.log('boop');
            document.execCommand("copy");
        }

    };
})();
