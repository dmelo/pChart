<?php   
 /* CAT:Scatter chart */

 /* pChart library inclusions */
 include(__DIR__ . "/../library/pData.php");
 include(__DIR__ . "/../library/pDraw.php");
 include(__DIR__ . "/../library/pImage.php");
 include(__DIR__ . "/../library/pScatter.php");

 /* Create the pData object */
 $myData = new pData();  

 /* Create the X axis and the binded series */
 for ($i=0;$i<=10;$i=$i+1) { $myData->addPoints(rand(1,20),"Probe 1"); }
 for ($i=0;$i<=10;$i=$i+1) { $myData->addPoints(rand(1,20),"Probe 2"); }
 $myData->setAxisName(0,"X-Index");
 $myData->setAxisXY(0,AXIS_X);
 $myData->setAxisPosition(0,AXIS_POSITION_TOP);

 /* Create the Y axis and the binded series */
 for ($i=0;$i<=10;$i=$i+1) { $myData->addPoints(rand(1,20),"Probe 3"); }
 $myData->setSerieOnAxis("Probe 3",1);
 $myData->setAxisName(1,"Y-Index");
 $myData->setAxisXY(1,AXIS_Y);
 $myData->setAxisPosition(1,AXIS_POSITION_LEFT);

 /* Create the 1st scatter chart binding */
 $myData->setScatterSerie("Probe 1","Probe 3",0);
 $myData->setScatterSerieDescription(0,"This year");
 $myData->setScatterSerieColor(0,array("R"=>0,"G"=>0,"B"=>0));
 $myData->setScatterSerieShape(0,SERIE_SHAPE_TRIANGLE);

 /* Create the 2nd scatter chart binding */
 $myData->setScatterSerie("Probe 2","Probe 3",1);
 $myData->setScatterSerieDescription(1,"Last Year");
 $myData->setScatterSerieShape(1,SERIE_SHAPE_FILLEDTRIANGLE);

 /* Create the pChart object */
 $myPicture = new pImage(400,400,$myData);

 /* Turn of Anti-aliasing */
 $myPicture->Antialias = FALSE;

 /* Add a border to the picture */
 $myPicture->drawRectangle(0,0,399,399,array("R"=>0,"G"=>0,"B"=>0));

 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
 
 /* Set the graph area */
 $myPicture->setGraphArea(40,40,370,370);

 /* Create the Scatter chart object */
 $myScatter = new pScatter($myPicture,$myData);

 /* Draw the scale */
 $scaleSettings = array("XMargin"=>15,"YMargin"=>15,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myScatter->drawScatterScale($scaleSettings);

 /* Draw the legend */
 $myScatter->drawScatterLegend(280,380,array("Mode"=>LEGEND_HORIZONTAL,"Style"=>LEGEND_NOBORDER));

 /* Draw a scatter plot chart */
 $myPicture->Antialias = TRUE;
 $myScatter->drawScatterPlotChart();

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("pictures/example.example.drawScatterShape.png");
?>