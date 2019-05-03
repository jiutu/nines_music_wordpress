
<?php
function nines_music_template_output(){
	$loop = (esc_attr(get_option('nines_music_loop'))) ? esc_attr(get_option('nines_music_loop')) : 'all' ;
	$autoplay = (esc_attr(get_option('nines_music_autoplay'))) ? esc_attr(get_option('nines_music_autoplay')) : 'false' ;
	$id = (esc_attr(get_option('nines_music_id'))) ? esc_attr(get_option('nines_music_id')) : '454479218' ;
	return '
	<div id="nines_music"></div>
	<script>
		const music = new APlayer({
		    container: document.getElementById("nines_music"),
		    lrcType: 1,
		    loop: "'.$loop.'",
		    fixed: true,
		    autoplay: '.$autoplay.',
		    mutex:  true,
		  });
		  fetch163Playlist('.$id.').then(function (data) {
		    for (var i=0;i<data.length;i++){
		      music.list.add([{
		        name: data[i].name,
		        artist: data[i].artist,
		        url: data[i].url,
		        cover: data[i].pic,
		        lrc: data[i].lrc.base
		      }]);
		    };
		  }).catch(function (err) {
		    console.error(err);
		  })


		  function fetch163Playlist(playlist_id) {
		    return new Promise(function (ok, err) {
		      fetch("https://v1.hitokoto.cn/nm/playlist/" + playlist_id)
		      .then(function (response) {
		        return response.json();
		      })
		      .then(function (data) {
		        var arr = [];
		        data.playlist.tracks.map(function (value) {
		          arr.push(value.id);
		        });
		        return arr;
		      })
		      .then(function (ids) {
		        return fetch163Songs(ids);
		      })
		      .then(function (data) {
		        ok(data);
		      })
		      .catch(function (e) {
		        err(e);
		      });
		    })
		  }

		  function fetch163Songs(IDS) {
		    return new Promise(function (ok, err) {
		      var ids;
		      switch (typeof IDS) {
		        case "number":
		        ids = [IDS];
		        break;
		        case "object":
		        if (!Array.isArray(IDS)) {
		          err(new Error("Please enter array or number"));
		        }
		        ids = IDS;
		        break;
		        default:
		        err(new Error("Please enter array or number"));
		        break;
		      }  
		      fetch("https://v1.hitokoto.cn/nm/summary/" + ids.join(",") + "?lyric=true&common=true")
		      .then(function (response) {
		        return response.json();
		      })
		      .then(function (data) {
		        var songs = [];
		        data.songs.map(function (song) {
		          songs.push({
		            name: song.name,
		            url: song.url,
		            artist: song.artists.join("/"),
		            album: song.album.name,
		            pic: song.album.picture,
		            lrc: song.lyric
		          });
		        });
		        return songs;
		      })
		      .then(function (result) {
		        ok(result);
		      })
		      .catch(function (e) {
		        err(e);
		      });
		    });
		  }
	</script>';
}
?>

