// // import
// import WaveSurfer from 'wavesurfer.js';
//
// import CursorPlugin from 'wavesurfer.js/src/plugin/cursor.js'
// import RegionPlugin from 'wavesurfer.js/src/plugin/regions.js'
//
// $(".wavesurfer-block").each(()=>{
//
//     let container = document.getElementById($(this).id);
//
//     let wavesurfer = WaveSurfer.create({
//         container: container,
//         waveColor: 'violet',
//         progressColor: 'purple',
//         scrollParent: true,
//
//         plugins: [
//             CursorPlugin.create({
//                 showTime: true,
//                 opacity: 1,
//                 customShowTimeStyle: {
//                     'background-color': '#000',
//                     color: '#fff',
//                     padding: '2px',
//                     'font-size': '10px',
//                     zIndex: 0
//                 }
//             }),
//
//             RegionPlugin.create({
//                 dragSelection: {
//                     slop: 5
//
//                 }
//             })
//         ]
//     });
//     wavesurfer.load($(this).data('audioFile'));
//     let button = $('<button class="btn btn-primary">\n' +
//         '                                <i class="glyphicon glyphicon-play"></i>\n' +
//         '                                Play /\n' +
//         '                                <i class="glyphicon glyphicon-pause"></i>\n' +
//         '                                Pause\n' +
//         '                            </button>');
//
//     button.addEventListener('click', wavesurfer.playPause.bind(wavesurfer));
//
//     container.append(button);
//
// });
