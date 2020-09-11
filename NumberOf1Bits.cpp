// Hi, here's your problem today. This problem was recently asked by Google:
// Given an integer, find the number of 1 bits it has.
// Here's an example and some starting code.

#include <iostream>

int numberOf1Bits(int number)
{
    int result = 0;
    number = abs(number);
    
    while (number) {
        result += number & 0b1;
        number >>= 1;
    }
    
    return result;
}

int main()
{
    std::cout << numberOf1Bits(23) << std::endl;
    std::cout << numberOf1Bits(15) << std::endl;
    std::cout << numberOf1Bits(16) << std::endl;

    return 0;
}
