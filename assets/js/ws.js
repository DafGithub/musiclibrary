// ---------------- Wavesurfer------------------

$(function () {
    $('.SongComponent').each(function (index, element) {
        $waveSuferBlock = $(element).find('.wafesurfer-block:first');

        var wavesurfer = WaveSurfer.create({
            container: $waveSuferBlock.get(0),
            waveColor: 'violet',
            progressColor: 'purple',
            height: 100,
            scrollParent: false,
            responsive: true,

            plugins: [
                WaveSurfer.cursor.create({
                    showTime: true,
                    opacity: 1,
                    customShowTimeStyle: {
                        'background-color': '#5d82ee',
                        color: '#fff',
                        padding: '2px',
                        'font-size': '10px',
                        zIndex: 0
                    }
                }),

                WaveSurfer.regions.create({
                    dragSelection: true,
                })

            ]
        });
        wavesurfer.load($waveSuferBlock.data('audioFile'));

        wavesurfer.on('region-click', function (region, e) {
            e.stopPropagation();

            if (e.altKey) {
                region.remove();
            }
            if (e.shiftKey) {
                region.playLoop();
            }

        });

        // Show clip duration
        wavesurfer.on('ready', function () {
            $(element).find('.waveform__duration').text(formatTime(wavesurfer.getDuration()));
        });

        // Show current time
        wavesurfer.on('audioprocess', function () {
            $(element).find('.waveform__counter').text(formatTime(wavesurfer.getCurrentTime()));
        });

        var $playButton = $(element).find('.play-button');
        $playButton.on('click', function () {
            wavesurfer.playPause();
            $(this).find('.fa-play').toggleClass('fa-pause');
            $(this).find('.fa-pause').toggleClass('fa-play');
        });

    });

    var formatTime = function (time) {
        return [
            Math.floor((time % 3600) / 60), // minutes
            ('00' + Math.floor(time % 60)).slice(-2) // seconds
        ].join(':');
    };


});

$('a.ajaxLink').click(function (e) {
    let $_this = $(this);
    e.preventDefault();
    $.ajax($(this).attr('href'))
        .done(function () {
            $.notify({
                message: $_this.data('successMessage')
            }, {
                type: 'success'
            });
        })
        .fail(function () {
            $.notify({
                message: 'Something wrong just happened'
            }, {
                type: 'error'
            });
            ;
        })
    // .always(function() {
    //     alert( "complete" );
    // });
});