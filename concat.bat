(for %%i in (./videos/*.mp4) do @echo file %%i) > ./videos/listaVideos.txt 

ffmpeg -y -f concat -i ./videos/listaVideos.txt -c copy saida.mp4
