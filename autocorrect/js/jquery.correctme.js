jQuery.fn.correctme = function (options)
{



    if ("text" != jQuery(this).attr("type") && !jQuery(this).is("textarea"))
    {
        return;
    }

    // Default parameters for plugin with some default corrections
    var defaults = {
        corrections: {
            teh: "the",
            gr8: "great",
            taht: "that",
            ur: "you are",
            arent: "are not"
        }
    };

    // Merge corrections passed at run-time
    if (options && options.corrections)
    {
        options.corrections = jQuery.extend(defaults.corrections, options.corrections);
    }

    // Merge options passed at run-time
    var opts = jQuery.extend(defaults, options);

    this.keyup(function (e)
    {
        // If currently entered key is not 'space' then don't need to proceed further
        if (32 != e.keyCode)
        {
            return;
        }

        var lastword = this.value;

        var stringToSearch = lastword.split(" ").slice(0, -1).pop();

        if (!opts.corrections[stringToSearch])
        {


            var match = /\r|\n/.exec(stringToSearch);

            if (match)
            {
                var matcharr = stringToSearch.split('\n');
                var reparr = [];
                for (var icnt = 0; icnt < matcharr.length; icnt++)
                {
                    if (!opts.corrections[matcharr[icnt]])
                    {
                        reparr.push(matcharr[icnt]);
                    }
                    else
                    {
                        reparr.push(opts.corrections[matcharr[icnt]]);
                    }
                }

                repstrg = reparr.join("\n");



                var n = this.value.lastIndexOf(stringToSearch);

                this.value = this.value.slice(0, n) + this.value.slice(n).replace(stringToSearch, repstrg);




            }
            return;
        }


        if (stringToSearch.indexOf(String.fromCharCode(13)) == -1)

        {
            var stringToReplace = opts.corrections[stringToSearch];

            var n = this.value.lastIndexOf(stringToSearch);

            this.value = this.value.slice(0, n) + this.value.slice(n).replace(stringToSearch, stringToReplace);

        }







    });


};
