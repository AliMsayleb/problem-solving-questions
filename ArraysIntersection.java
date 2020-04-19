import java.util.*;

// Hi, here's your problem today. This problem was recently asked by Amazon:
// Given two arrays, write a function to compute their intersection - the intersection means the numbers that are in both arrays.

//        Example 1:
//        Input: nums1 = [1,2,2,1], nums2 = [2,2]
//        Output: [2]
//        Example 2:
//        Input: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
//        Output: [9,4]
//        Note:
//        Each element in the result must be unique.
//        The result can be in any order.

public class ArraysIntersection {
    public static List<Integer> intersect(int[] a, int[] b)
    {
        HashSet<Integer> elements = new HashSet<>();
        ArrayList<Integer> result = new ArrayList<>();
        for (int current: a) {
            elements.add(current);
        }

        for (int current: b) {
            if (elements.contains(current)) {
                result.add(current);
                elements.remove(current);
            }
        }

        return result;
    }

    public static String transform(List<Integer> integers)
    {
        String res = "";
        for (int i = 0; i < integers.size() - 1; i++) {
            res += integers.get(i) + ", ";
        }
        res += integers.get(integers.size()-1);

        return res;
    }

    public static void main(String[] args)
    {
        List<Integer> result;
        result = intersect(new int[]{4, 9, 5}, new int[] {9, 4, 9, 8, 4});
        System.out.println("[" + transform(result) + "]");
    }
}
