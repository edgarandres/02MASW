import { Component, OnInit } from '@angular/core';
import { Cancion } from 'src/app/models/cacancion';
import { Disco } from 'src/app/models/disco';

@Component({
  selector: 'app-musica',
  templateUrl: './musica.component.html',
  styleUrls: ['./musica.component.css']
})
export class MusicaComponent implements OnInit {

public numero:number = 2;
public discos: Array<any>;
public cancionReproducida: Cancion = new Cancion(0, '','','');

  constructor() { 
    this.discos = [
      new Disco("Greatest hits","The Beatles","1987",'https://picsum.photos/200/300?grayscale',[
        new Cancion(1,'Hollywood','The Beatles','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(2,'Yellow submarine','The Beatles','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(3,'Imagine','The Beatles','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3')
      ]),
      new Disco("Greatest hits","Queen",'1989','https://picsum.photos/200/300/?blur',[
        new Cancion(1,'Hollywood','Queen','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(2,'Yellow submarine','Queen','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(3,'Imagine','Queen','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3')
      ]),
      new Disco("Greatest hits","The Cranberries",'1997','https://picsum.photos/id/870/200/300?grayscale&blur=2',[
        new Cancion(1,'Hollywood','The Cranberries','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(2,'Yellow submarine','The Cranberries','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(3,'Imagine','The Cranberries','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3')
      ]),
      new Disco("Greatest hits","The Doors",'1982','https://picsum.photos/200/300.jpg',[
        new Cancion(1,'Hollywood','The Doors','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(2,'Yellow submarine','The Doors','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3'),
        new Cancion(3,'Imagine','The Doorss','https://cdn.pixabay.com/download/audio/2022/01/26/audio_d0c6ff1bdd.mp3?filename=the-cradle-of-your-soul-15700.mp3')
      ]),
    ]
  }

  ngOnInit(): void {
  }

  reproducirCancion(cancion:Cancion){
    console.log('Quiero reproducir la cancion: ', cancion)
    this.cancionReproducida = cancion;
    let audioPlayer = document.getElementById("audioPlayer") as HTMLAudioElement;
    audioPlayer.setAttribute('src', cancion.ruta);
    audioPlayer.play();
  }
}
