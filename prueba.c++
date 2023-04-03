#include "BluetoothSerial.h"

#if !defined(CONFIG_BT_ENABLED) || !defined(CONFIG_BLUEDROID_ENABLED)
#error Bluetooth is not enabled! Please run `make menuconfig` to and enable it
#endif


// Asignar variables de salida a los pines GPIO
const int motor1ad = 5; //
const int motor1at = 4; //
const int motor2ad = 0; //
const int motor2at = 2; //
const int Vizq = 19 ; //velocidad de motores izquierdos
const int Vder = 18 ; //velocidad de motores derechos
char doblar;
char avanzar;
char girar;
char estado; //revisar aca
char estado_interno;

const char IR_ADELANTE = '1';
const char IR_ATRAS = '2';
const char NO_IR_ADELANTE = '5';
const char NO_IR_ATRAS = '6';

const char DOBLAR_IZQUIERDA = '3';
const char DOBLAR_DERECHA = '4';
const char NO_DOBLAR_IZQUIERDA = '7';
const char NO_DOBLAR_DERECHA = '8';

const char GIRAR_DERECHA = 'b';
const char GIRAR_IZQUIERDA = 'a';
const char NO_GIRAR_DERECHA = 'd';
const char NO_GIRAR_IZQUIERDA = 'c';

BluetoothSerial SerialBT;

void setup() {
  Serial.begin(9600);
  SerialBT.begin("Barricada"); //Bluetooth device name
  //////Serial.print(ln("The device started, now you can pair it with bluetooth!");

  pinMode(motor1ad, OUTPUT);
  pinMode(motor1at, OUTPUT);
  pinMode(motor2ad, OUTPUT);
  pinMode(motor2at, OUTPUT);
  pinMode(Vizq, OUTPUT);
  pinMode(Vder, OUTPUT);
}

void Doblar (bool sentido, bool accion ) { // TRUE :: Derecha :: sentido , Accion :: TRUE :: Adelante
  if (sentido) {
    if (accion) {  // Doblar derecha
      analogWrite(Vder, 40);
    }
    else {  // Dejar de doblar a la derecha
      analogWrite(Vder, 255);
    }
  }
  else {
    if (accion) { // Doblar izquierda
      analogWrite(Vizq, 40);
    }
    else { // Dejar doblar a la izquierda
      analogWrite(Vizq, 255);
    }
  }

}

void Motores(int ad_at, bool accion) {
  switch (ad_at) {
    case 0: // Apagar todo
      digitalWrite(motor2ad, LOW);
      digitalWrite(motor1ad, LOW);
      digitalWrite(motor2at, LOW);
      digitalWrite(motor1at, LOW);
      break;

    case 1: //  Adelante
      if (accion) { // Todo adelante
        analogWrite(Vizq, 255);
        analogWrite(Vder, 255);
        digitalWrite(motor2ad, HIGH);
        digitalWrite(motor1ad, HIGH);
      }
      else { // Dejar de ir adelante
        digitalWrite(motor2ad, LOW);
        digitalWrite(motor1ad, LOW);
      }

      break;

    case 2: // Atras
      if (accion) { // Todo atras
        analogWrite(Vizq, 255);
        analogWrite(Vder, 255);
        digitalWrite(motor2at, HIGH);
        digitalWrite(motor1at, HIGH);
      }
      else { // Dejar de ir atras
        digitalWrite(motor2at, LOW);
        digitalWrite(motor1at, LOW);
      }
      break;
  }
}

void Girar(bool sentido, bool accion) { // TRUE :: Derecha :: sentido , Accion :: TRUE :: Adelante
  digitalWrite(motor2at, LOW);
  digitalWrite(motor2ad, LOW);
  digitalWrite(motor1ad, LOW);
  digitalWrite(motor1at, LOW);
  if (sentido) {
    if (accion) {  // Girar derecha
      analogWrite(Vizq, 255);
      analogWrite(Vder, 255);
      digitalWrite(motor2at, HIGH);
      digitalWrite(motor1ad, HIGH);
    }
  }
  else {
    if (accion) { // Girar izquierda
      analogWrite(Vizq, 255);
      analogWrite(Vder, 255);
      digitalWrite(motor2ad, HIGH);
      digitalWrite(motor1at, HIGH);
    }
  }
}

void loop() {
  //Serial.print("LOOOOP");
  //delay(1000);
  if (SerialBT.available()) {
    estado = SerialBT.read();
    //Serial.print("Estado: ");
    ////Serial.println(estado);
    //delay(1000);
  } else {
    estado = -1;
  }

  if (estado == IR_ADELANTE || estado == IR_ATRAS || estado == NO_IR_ADELANTE || estado == NO_IR_ATRAS) {
    avanzar = estado;
    estado_interno = estado;
  } else {
    if (estado == DOBLAR_IZQUIERDA || estado == DOBLAR_DERECHA || estado == NO_DOBLAR_IZQUIERDA || estado == NO_DOBLAR_DERECHA) {
      doblar = estado;
      estado_interno = estado;
    } else {
      if (estado == GIRAR_IZQUIERDA || estado == GIRAR_DERECHA || estado == NO_GIRAR_IZQUIERDA || estado == NO_GIRAR_DERECHA) {
        girar = estado;
        estado_interno = estado;
      }
      //else {
      //Motores(0, false);
      //estado_interno = ' ';
      //}
    }
  }

  ////Serial.println("estado interno: ");
  ////Serial.println(estado_interno);
  ////delay(1000);
  switch (estado_interno) {
    case DOBLAR_IZQUIERDA:
      ////Serial.println("Doblar izquierda ");
      ////delay(1000);
      Doblar(false, true); // Doblar izquierda
      estado_interno = 'no';
      break;

    case DOBLAR_DERECHA:
      ////Serial.println("Doblar derecha ");
      ////delay(1000);
      Doblar(true, true); // Doblar derecha
      estado_interno = 'no';
      break;

    case NO_DOBLAR_IZQUIERDA: // Dejar de doblar izq
      ////Serial.println("Dejar de doblar izq");
      ////delay(1000);
      Doblar(false, false);
      estado_interno = 'no';
      break;

    case NO_DOBLAR_DERECHA: // Dejar de doblar derecha
      ////Serial.println("Dejar de doblar derecha ");
      //delay(1000);
      Doblar(true, false);
      estado_interno = 'no';
      break;
    case IR_ADELANTE: // Todo Adelante
      if (girar != GIRAR_IZQUIERDA && girar != GIRAR_DERECHA) {
        ////Serial.println("Todo Adelante ");
        ////delay(1000);
        Motores(1, true);
      }
      estado_interno = 'no';
      break;

    case IR_ATRAS: // Todo atras
      ////Serial.println("Todo atras ");
      //delay(1000);
      if (girar != GIRAR_IZQUIERDA && girar != GIRAR_DERECHA) {
        Motores(2, true);
      }
      estado_interno = 'no';
      break;


    case NO_IR_ADELANTE: // Dejar de ir para adelante
      ////Serial.println("Dejar de ir para adelante");
      //delay(1000);
      if (girar != GIRAR_IZQUIERDA && girar != GIRAR_DERECHA) {
        Motores(1, false);
      }
      estado_interno = 'no';
      break;

    case NO_IR_ATRAS: // Dejar de ir para atras
      ////Serial.println("Dejar de ir para atras");
      //delay(1000);
      if (girar != GIRAR_IZQUIERDA && girar != GIRAR_DERECHA) {
        Motores(2, false);
      }
      estado_interno = 'no';
      break;

    case GIRAR_IZQUIERDA: // Girar izquierda
      ////Serial.println("Girar izquierda ");
      //delay(1000);
      /*
        if (avanzar == IR_ADELANTE || avanzar == IR_ATRAS) {
        ////Serial.println(" girar izquierda - apago motores");
        //delay(1000);
        Motores(0, false);
        }
      */
      Girar(false, true);
      estado_interno = 'no';
      break;

    case NO_GIRAR_IZQUIERDA: // Dejar de girar izquierda
      ////Serial.println(" Dejar de girar izquierda");
      //delay(1000);
      Girar(false, false);
      if (avanzar == IR_ADELANTE || avanzar == IR_ATRAS) {
        estado_interno = avanzar;
      } else {
        //Serial.print("Dejar de girar izquierda - estado interno: ");
        ////Serial.println(estado_interno);
        //delay(1000);
        estado_interno = 'no';
      }
      break;

    case GIRAR_DERECHA: // Girar derecha
      ////Serial.println("Girar derecha ");
      //delay(1000);
      if (avanzar == IR_ADELANTE || avanzar == IR_ATRAS) {
        ////Serial.println(" girar derecha - apago motores");
        //delay(1000);
        Motores(0, false);
      }
      Girar(true, true);
      estado_interno = 'no';
      break;

    case NO_GIRAR_DERECHA: // Dejar de girar derecha
      ////Serial.println("Dejar de girar derecha ");
      //delay(1000);
      Girar(true, false);
      if (avanzar == IR_ADELANTE || avanzar == IR_ATRAS) {
        estado_interno = avanzar;
      } else {
        //Serial.print("Dejar de girar derecha - estado interno: ");
        ////Serial.println(estado_interno);
        //delay(1000);
        estado_interno = 'no';
      }
      break;
  }
}