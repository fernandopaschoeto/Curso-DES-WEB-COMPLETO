import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  constructor() {}

  public titulo: String = "Meu primeiro App";

  public imagemRandomica: String = "https://cdn.stocksnap.io/img-thumbs/960w/mushroom-fungus_IJ0B3RFSXX.jpg";
  public imagemLocal: String = "../assets/icone-celular.png";

  public atualiza(): void {
    this.titulo = "Texto alterado. "
  }
  public normaliza(): void {
    this.titulo = "Meu primeiro App"
  }


}
