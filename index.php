<table border="0" width="100%">
	<tr>
		<th>Imagem</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Views</th>
		<th>Tempo</th>
		<th>Link</th>
	</tr>
<?php
require 'simple_html_dom.php';
//pegango o html do resultado de busca
$html = file_get_html('https://www.youtube.com/results?search_query='.$_GET['q']);
//array qye vai conter meus resultados, seleciona a class .yt-lockup
$results = $html->find('.yt-lockup');

foreach($results as $video) {
         //pegando a imagem da classe
	$imagem = $video->find('.yt-thumb-simple img', 0)->attr['src'];
	$tempo = $video->find('.video-time', 0)->plaintext;
	$link = 'https://www.youtube.com'.$video->find('.yt-lockup-title a', 0)->href;
        //pega o texto plaintext
	$titulo = $video->find('.yt-lockup-title a', 0)->plaintext;
	$autor = $video->find('.yt-lockup-byline a', 0)->plaintext;
	$views = $video->find('.yt-lockup-meta-info li', 1)->plaintext;
	?>
	<tr>
		<td><img src="<?php echo $imagem; ?>" border="0" height="80" /></td>
		<td><?php echo $titulo; ?></td>
		<td><?php echo $autor; ?></td>
		<td><?php echo $views; ?></td>
		<td><?php echo $tempo; ?></td>
		<td><?php echo $link; ?></td>
	</tr>
	<?php
}
?>
</table>