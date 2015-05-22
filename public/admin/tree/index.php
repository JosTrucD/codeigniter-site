<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Insert title here</title>
	 <link rel="stylesheet" type="text/css" href="css/aciTree.css" media="all">
     <link rel="stylesheet" type="text/css" href="css/demo.css" media="all">
     <script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript" src="js/jquery.aciPlugin.min.js"></script>
     <script type="text/javascript" src="js/jquery.aciSortable.min.js"></script>
     <script type="text/javascript" src="js/jquery.aciTree.dom.js"></script>
     <script type="text/javascript" src="js/jquery.aciTree.core.js"></script>
     <script type="text/javascript" src="js/jquery.aciTree.utils.js"></script>
     <script type="text/javascript" src="js/jquery.aciTree.selectable.js"></script>
     <script type="text/javascript" src="js/jquery.aciTree.sortable.js"></script>
	 <script type="text/javascript">
		 $(function() {
		  
		     // init the tree
		     $('#tree1').aciTree({
		         ajax: {
		             url: 'json/checkbox-radio-button.json'
		         },
		         sortable: true
		     });
		  
		 });
	 </script>
</head>
<body>
	<div id="tree1" class="aciTree aciTree0" role="tree" tabindex="0"  onselectstart="return false" style="-webkit-user-select: none;">
	<div>
	<div style="clear: left;"></div>
</body>
</html>