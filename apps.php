<?php
$apps = [
 ['id'=>1,'name'=>'Pixel Studio','category'=>'Design','price'=>'Grátis','rating'=>'4.9','icon'=>'🎨','description'=>'Crie artes, ilustrações e designs incríveis.'],
 ['id'=>2,'name'=>'Focus Flow','category'=>'Produtividade','price'=>'R$ 19,90','rating'=>'4.8','icon'=>'⏱️','description'=>'Organize tarefas e mantenha seu foco.'],
 ['id'=>3,'name'=>'SoundWave','category'=>'Música','price'=>'Grátis','rating'=>'4.7','icon'=>'🎧','description'=>'Descubra playlists e sons para qualquer momento.'],
 ['id'=>4,'name'=>'CodeLab','category'=>'Educação','price'=>'R$ 9,90','rating'=>'4.9','icon'=>'💻','description'=>'Aprenda programação com desafios interativos.'],
 ['id'=>5,'name'=>'FitTrack','category'=>'Saúde','price'=>'Grátis','rating'=>'4.6','icon'=>'🏃','description'=>'Acompanhe seus hábitos e atividades diárias.'],
 ['id'=>6,'name'=>'TravelNote','category'=>'Viagem','price'=>'R$ 4,90','rating'=>'4.5','icon'=>'🧭','description'=>'Planeje viagens e organize seus roteiros.']
];
$q=trim($_GET['q']??''); $category=$_GET['categoria']??'Todas';
$filtered=array_filter($apps,function($app)use($q,$category){$matchQ=$q===''||stripos($app['name'],$q)!==false||stripos($app['description'],$q)!==false;$matchC=$category==='Todas'||$app['category']===$category;return $matchQ&&$matchC;});
$categories=array_unique(array_column($apps,'category'));
?>
<!DOCTYPE html><html lang="pt-BR"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>NovaStore | Aplicativos</title><link rel="stylesheet" href="style.css"></head><body>
<header class="topbar"><a class="brand" href="index.php"><span class="brand-icon">✦</span> NovaStore</a><nav><a href="index.php">Início</a><a class="active" href="apps.php">Aplicativos</a></nav><a class="nav-cta" href="apps.php">Explorar loja ↗</a></header>
<main class="container"><section class="catalog-head"><span class="eyebrow">CATÁLOGO NOVASTORE</span><h1>Descubra seu próximo app.</h1><p>Explore ferramentas e experiências para o seu dia a dia.</p></section>
<form class="filter-bar" method="get" action="apps.php"><input type="search" name="q" placeholder="Buscar aplicativo..." value="<?php echo htmlspecialchars($q); ?>"><select name="categoria"><option value="Todas">Todas as categorias</option><?php foreach($categories as $cat): ?><option value="<?php echo htmlspecialchars($cat); ?>" <?php echo $category===$cat?'selected':''; ?>><?php echo htmlspecialchars($cat); ?></option><?php endforeach; ?></select><button class="button" type="submit">Buscar</button></form>
<div class="results-label"><span><?php echo count($filtered); ?> aplicativo(s) encontrado(s)</span><span>Seleção NovaStore</span></div><section class="app-grid catalog-grid">
<?php foreach($filtered as $app): ?><article class="app-card"><div class="app-icon"><?php echo $app['icon']; ?></div><div class="app-info"><h3><?php echo htmlspecialchars($app['name']); ?></h3><p><?php echo htmlspecialchars($app['category']); ?></p><div class="app-meta"><span>★ <?php echo $app['rating']; ?></span><span><?php echo $app['price']; ?></span></div></div><a class="small-button" href="detalhes.php?id=<?php echo $app['id']; ?>">Ver detalhes</a></article><?php endforeach; ?>
<?php if(!$filtered): ?><div class="empty-state"><h3>Nenhum aplicativo encontrado</h3><p>Tente buscar por outro nome ou categoria.</p></div><?php endif; ?></section></main><footer><span>© 2026 NovaStore</span><span>Uma vitrine de experiências digitais.</span></footer></body></html>
