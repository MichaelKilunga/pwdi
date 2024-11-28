<?php
            function limitWords($text, $limit) {
                // Split the text into an array of words
                $words = explode(' ', $text);

                // Check if the word count exceeds the limit
                if (count($words) > $limit) {
                    // Join only the first $limit words and append "..." to indicate truncation
                    return implode(' ', array_slice($words, 0, $limit)) . '...';
                }

                // If the word count is within the limit, return the original text
                return $text;
            }

            // Example usage with your gallery description
            $description = "PWDI believes that land rights and tenure security is a cornerstone for a sustainable pastoralists and farming communities living in harmony. To achieve that PWDI will undertake land rights and tenure security programs through capacity building interventions to community especially women, and youth. Formation of leadership forums and provision of Certificates of Customary Rights of Occupancy (CCROs) to individuals and groups of pastoralists."; // Assuming $rowa is properly defined
            $limitedDescription = limitWords($description,5);
            echo $limitedDescription;

            ?>