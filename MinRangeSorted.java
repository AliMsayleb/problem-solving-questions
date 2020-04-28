//Hi, here's your problem today. This problem was recently asked by Twitter:
//Given a list of integers, return the bounds of the minimum range that must be sorted
// so that the whole list would be sorted.
//Example:
//Input: [1, 7, 9, 5, 7, 8, 10]
//Output: (1, 5)
//Explanation:
//The numbers between index 1 and 5 are out of order and need to be sorted.
public class MinRangeSorted
{
    public static int[] minRange(int[] elements) throws Exception {
        int start = -1, end = elements.length - 1, min, max;
        for (int i = 0; i < elements.length - 1; i++) {
            if (elements[i] > elements[i+1]) {
                start = i;
                break;
            }
        }
        if (start == -1) {
            throw new Exception("Array Already sorted");
        }

        for (int i = elements.length - 1; i > 0; i--) {
            if (elements[i] < elements[i - 1]) {
                end = i;
            }
        }
        max = elements[start];
        min = elements[end];
        for (int i = start; i <= end; i++) {
            if (elements[i] > max) {
                max = elements[i];
            } else if (elements[i] < min) {
                min = elements[i];
            }
        }
        while (start >= 0 && elements[start] > min) {
            start--;
        }
        while (end < elements.length && elements[end] < max) {
            end++;
        }

        int [] result = new int[2];
        result[0] = start + 1;
        result[1] = end - 1;

        return result;
    }

    public static void main(String[] args)
    {
        int[] result;
        int[] elements = {1, 5, 6, 9, 11, 13, 15, 16, 2, 4, 6, 8, 10};
//        int[] elements = [1, 7, 9, 5, 7, 8, 10]
        try {
            result = minRange(elements);
            System.out.println("[" + result[0] + ", " + result[1] +"]");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }
}
