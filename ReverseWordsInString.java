//Hi, here's your problem today. This problem was recently asked by Facebook:
//Given a string, you need to reverse the order of characters in each word within a sentence while still preserving whitespace and initial word order.
//Example 1:
//Input: "The cat in the hat"
//Output: "ehT tac ni eht tah"
//Note: In the string, each word is separated by single space and there will not be any extra space in the string.
public class ReverseWordsInString {
    public static String solutionTwo(String sentence)
    {
        char[] characters = sentence.toCharArray();
        String currentWord = "";
        String result = "";
        for (int i = characters.length - 1; i >= 0; i--) {
            if (characters[i] != ' ') {
                currentWord += characters[i];
            } else {
                result = currentWord + " " + result;
                currentWord = "";
            }
        }

        return currentWord + " " + result;
    }

    public static String reverseWords(String sentence)
    {
        int wordStart = 0;
        char[] characters = sentence.toCharArray();
        for (int i = 1; i < characters.length; i++) {
            if (characters[i] == ' ') {
                reverseWord(characters, wordStart, i-1);
                wordStart = i + 1;
            }
        }

        if (wordStart < characters.length) {
            reverseWord(characters, wordStart, characters.length - 1);
        }

        return new String(characters);
    }

    private static void reverseWord(char[] characters, int start, int end)
    {
        char temp;
        while (start < end) {
            temp = characters[start];
            characters[start] = characters[end];
            characters[end] = temp;
            start++;
            end--;
        }
    }

    public static void main(String[] args)
    {
        System.out.println(reverseWords("The cat in the hat"));
        System.out.println(solutionTwo("The cat in the hat")); // Bad performance wise
    }
}
