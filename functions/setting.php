<?php
function nines_music_settings_page() {
  ?>
  <div class="wrap">
    <h2>音乐播放器 By_不问归期</h2> <p>留言( 地址: <a href="https://www.aliluv.cn/liuyan">https://www.aliluv.cn/liuyan </a> )</p>
    <form method="post" action="options.php">
      <?php settings_fields( 'nines-music-settings-group' );?>
      <?php do_settings_sections( 'nines-music-settings-group' );?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">网易云音乐歌单ID</th>
          <td><input type="text" name="nines_music_id" class="regular-text nm-color-picker" value="<?php echo esc_attr( get_option('nines_music_id') ); ?>" /> 如：454479218</td>
        </tr>

        <tr valign="top">
          <th scope="row">音频循环播放</th>
          <td><input type="text" name="nines_music_loop" class="regular-text nm-color-picker" value="<?php echo esc_attr( get_option('nines_music_loop') ); ?>" /> 可选值(二选一即可): all , none</td>
        </tr>
        
        <tr valign="top">
          <th scope="row">音频自动播放</th>
          <td><input type="text" name="nines_music_autoplay" class="regular-text nm-color-picker" value="<?php echo esc_attr( get_option('nines_music_autoplay') ); ?>" /> 可选值(二选一即可): false , true</td>
        </tr>
        <!-- <tr valign="top">
          <th scope="row">作者插件推荐: </th>
          <td>
          </td>
        </tr> -->
        <tr valign="top">
          <th scope="row">小小提示: </th>
          <td>如果 歌单ID 没有填写，将默认使用作者的音乐id进行播放</td>
        </tr>
        <tr valign="top">
          <th scope="row">演示地址: </th>
          <td><a href="https://www.aliluv.cn">https://www.aliluv.cn </a> </td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
  <?php }?>