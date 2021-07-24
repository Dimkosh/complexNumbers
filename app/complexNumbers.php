<?php
    class ComplexNumbers {
        public function Addition($firstNumber, $secondNumber) {
            //Check numbers
            if(!self::CheckNumber($firstNumber)):
                return "n1 is not a complex number";
            endif;
            if(!self::CheckNumber($secondNumber)):
                return "n2 is not a complex number";
            endif;

            //Get numers parths
            $numbers = self::FormatNumbers($firstNumber, $secondNumber);

            //Calc result
            $result = array(
                "left" => $numbers["a1"] + $numbers["a2"],
                "right" => $numbers["b1"] + $numbers["b2"]
            );
            return self::showResult($result, "+");
        }

        public function Subtraction($firstNumber, $secondNumber) {
            //Check numbers
            if(!self::CheckNumber($firstNumber)):
                return "n1 is not a complex number";
            endif;
            if(!self::CheckNumber($secondNumber)):
                return "n2 is not a complex number";
            endif;

            //Get numers parths
            $numbers = self::FormatNumbers($firstNumber, $secondNumber);

            //Calc result
            $result = array(
                "left" => $numbers["a1"] - $numbers["a2"],
                "right" => $numbers["b1"] - $numbers["b2"]
            );
            return self::showResult($result, "-");
        }

        public function Division($firstNumber, $secondNumber) {
            //Check numbers
            if(!self::CheckNumber($firstNumber)):
                return "n1 is not a complex number";
            endif;
            if(!self::CheckNumber($secondNumber)):
                return "n2 is not a complex number";
            endif;

            //Get numers parths
            $numbers = self::FormatNumbers($firstNumber, $secondNumber);

            //Calc result
            $result = array(
                "left" => ($numbers["a1"] * $numbers["a2"] + $numbers["b1"] * $numbers["b2"]) / (pow($numbers["a2"], 2) + pow($numbers["b2"], 2)),
                "right" => ($numbers["a2"] * $numbers["b1"] - $numbers["a1"] * $numbers["b2"]) / (pow($numbers["a2"], 2) + pow($numbers["b2"], 2))
            );
            return self::showResult($result, "/");
        }

        public function Multiplication($firstNumber, $secondNumber) {
            //Check numbers
            if(!self::CheckNumber($firstNumber)):
                return "n1 is not a complex number";
            endif;
            if(!self::CheckNumber($secondNumber)):
                return "n2 is not a complex number";
            endif;

            //Get numers parths
            $numbers = self::FormatNumbers($firstNumber, $secondNumber);

            //Calc result
            $result = array(
                "left" => ($numbers["a1"] * $numbers["a2"]) - ($numbers["b1"] * $numbers["b2"]),
                "right" => ($numbers["a1"] * $numbers["b2"]) + ($numbers["b1"] * $numbers["a2"])
            );
            return self::showResult($result, "*");
        }

        public function Test($firstNumber, $secondNumber) {
            //Get random method
            $method = rand(0, 3);

            switch($method):
                case 0:
                    return self::Addition($firstNumber, $secondNumber);
                    break;
                case 1:
                    return self::Subtraction($firstNumber, $secondNumber);
                    break;
                case 2:
                    return self::Division($firstNumber, $secondNumber);
                    break;
                case 3:
                    return self::Multiplication($firstNumber, $secondNumber);
                    break;
            endswitch;
        }

        private function showResult($result, $action) {
            $str = "n1{$action}n2=";
            if($result["left"] != 0):
                $str .= $result["left"];
                if($result["right"] > 0):
                    $str .= "+";
                endif;
            endif;
            if($result["right"] != 0):
                $str .= $result["right"] . "i";
            endif;
            
            return $str;
        }

        private function CheckNumber($number) {
            return preg_match("/^(-?)[0-9]+[+-][0-9]*i$/", $number);
        }

        private function FormatNumbers($firstNumber, $secondNumber) {
            //Get numbers parths
            if(preg_match("/^(.+)([+-])(.+)$/", $firstNumber, $values)):
                $firstNumber = array(
                    $values[1],
                    ($values[2] == "-") ? "-{$values[3]}" : $values[3]
                );
            endif;
            if(preg_match("/^(.+)([+-])(.+)$/", $secondNumber, $values)):
                $secondNumber = array(
                    $values[1],
                    ($values[2] == "-") ? "-{$values[3]}" : $values[3]
                );
            endif;

            $result = array();
            if(!preg_match("/^(-?)[0-9]+i$/", $firstNumber[0])):
                $result["a1"] = (int) $firstNumber[0];
                $result["b1"] = (int) preg_replace("/i/", "", $firstNumber[1]);
            else:
                $result["a1"] = (int) preg_replace("/i/", "", $firstNumber[1]);
                $result["b1"] = (int) $firstNumber[0];
            endif;
            if(!preg_match("/^(-?)[0-9]+i$/", $secondNumber[0])):
                $result["a2"] = (int) $secondNumber[0];
                $result["b2"] = (int) preg_replace("/i/", "", $secondNumber[1]);
            else:
                $result["a2"] = (int) preg_replace("/i/", "", $secondNumber[1]);
                $result["b2"] = (int) $secondNumber[0];
            endif;

            return $result;
        }
    }
?>