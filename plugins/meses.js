var dameMes = function(mes) {
  switch (mes) {
    case 1 :
    case '01' :
            mes = 'Ene';
      break;
      case 2 :
      case '02' :
            mes = 'Feb';
        break;
        case 3 :
        case '03' :
             mes = 'Mar';
          break;
          case 4:
          case '04' :
               mes = 'Abr';
            break;
            case 5:
            case '05' :
                 mes = 'May';
              break;
              case 6:
              case '06' :
                   mes = 'Jun';
                break;
                case 7:
                case '07' :
                     mes = 'Jul';
                  break;
                  case 8:
                  case '08' :
                       mes = 'Ago';
                    break;
                    case 9:
                    case '09' :
                         mes = 'Sep';
                      break;
                      case 10:
                      case '10' :
                           mes = 'Oct';
                        break;
                        case 11:
                        case '11' :
                             mes = 'Nov';
                          break
                          case 12:
                          case '12' :
                               mes = 'Dic';
                            break;
    default:
    console.log('no hay un indice correcto de mes');

  }


  return mes };
