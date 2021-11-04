//import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';
import { UrlTree } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {

  constructor(private navegacao: NavController) {}

  ngOnInit() {
  }
  public pesquisa; 
  public titulo: String = "Meu primeiro App";
  public resultado: String = "";

  public imagemRandomica: String = "https://cdn.stocksnap.io/img-thumbs/960w/mushroom-fungus_IJ0B3RFSXX.jpg";
  public imagemLocal: String = "../assets/icone-celular.png";



  public recuperar(): void {
    this.resultado = this.pesquisa;
  }
  public atualiza(): void {
    this.titulo = "Texto alterado. ";
  }
  public normaliza(): void {
    this.titulo = "Meu primeiro App";
  }


  
  public abrirBotoes(): void {
     this.navegacao.navigateForward('botoes')
  }

  // Ou

  abrirLista(){
    this.navegacao.navigateForward('lista')
  }


}
