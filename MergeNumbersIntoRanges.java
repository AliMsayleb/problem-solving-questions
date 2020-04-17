//Hi, here's your problem today. This problem was recently asked by Facebook:
//Given a sorted list of numbers, return a list of strings that represent all of the consecutive numbers.
//        Example:
//        Input: [0, 1, 2, 5, 7, 8, 9, 9, 10, 11, 15]
//        Output: ['0->2', '5->5', '7->11', '15->15']
//        Assume that all numbers will be greater than or equal to 0, and each element can repeat.

import java.util.ArrayList;
import java.util.List;

public class MergeNumbersIntoRanges {
    public static List<String> mergeNumbers(int[] numbers)
    {
        if (numbers.length == 0) {
            return new ArrayList<>();
        }

        List<String> results = new ArrayList<>();
        int currentNumber, currentStart;
        currentNumber = currentStart = numbers[0];
        for (int i = 1; i < numbers.length; i++) {
            if (currentNumber == numbers[i]) {
                continue;
            }
            if (numbers[i] == currentNumber + 1) {
                currentNumber = numbers[i];
                continue;
            }
            results.add(currentStart + "->" + numbers[i - 1]);
            currentStart = numbers[i];
            currentNumber = numbers[i];
        }
        results.add(currentStart + "->" + numbers[numbers.length - 1]);

        return results;
    }

    public static void main(String[] args)
    {
        int[] numbers = new int[] {0, 1, 2, 5, 7, 8, 9, 9, 10, 11, 15, 16};
        List<String> results = mergeNumbers(numbers);
        System.out.println("[" + String.join(", ", results) + "]");
    }
}
